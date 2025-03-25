<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Roundplay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{


    public function adminDashboard(Request $request)
    {
        return view('admin.dashboard', [
            'user' => $request->user(),
        ]);
    }

    public function distanceDashboard(Request $request)
    {
        $user = auth()->user();

        if (!$user->state_id || !$user->name) {
            return redirect()->route('profile.edit');
        }

        return view('distance_dashboard');
    }

    // In your appropriate controller, e.g., AttendanceController.php

    public function attendanceDashboard(Request $request)
    {
        $user = $request->user();

        $roundplay = Roundplay::where('status', 'active')->latest('id')->first();
        if (! $roundplay) {
            return view('attendance.roundplay.no_active_roundplay');
        }

        // Check permission
        $hasPermission = DB::table('user_roundplay')
            ->where(['user_id' => $user->id, 'roundplay_id' => $roundplay->id])
            ->first();
        if (! $hasPermission) {
            return view('attendance.roundplay.no_permission_on_roundplay', compact('user'));
        }

        // Set answer to null and get the open question
        $answer = null;
        $question = Question::where(['app' => 'attendance', 'status' => 'open'])->first();
        if ($question) {
            $answer = Answer::where([
                'app'         => 'attendance',
                'question_id' => $question->id,
                'user_id'     => $user->id
            ])->first();
        }

        return view('attendance_dashboard', compact('question', 'answer', 'roundplay'));
    }

    public function getOpenQuestion(Request $request)
    {
        $user = $request->user();

        $question = Question::where(['app' => 'attendance', 'status' => 'open'])->first();

        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'لا توجد أسئلة مفتوحة حالياً.'
            ], 404);
        }

        $answer = Answer::where([
            'app'         => 'attendance',
            'question_id' => $question->id,
            'user_id'     => $user->id
        ])->first();

        return response()->json([
            'success'  => true,
            'question' => $question,
            'answer'   => $answer
        ]);
    }


    public function sendAnswer(Request $request)
    {
        $data = $request->validate([
            'question_id'  => ['required', 'exists:questions,id'],
            'user_id'      => ['required', 'exists:users,id'],
            'roundplay_id' => ['required', 'exists:roundplays,id'],
            'ans'          => ['required', 'string'],
        ]);

        $question = Question::find($data['question_id']);

        // Early return if question not found (extra safety)
        if (!$question) {
            return response()->json(['success' => false, 'message' => 'السؤال غير موجود.'], 404);
        }

        $correct = $data['ans'] === $question->ans ? 1 : 0;

        // Check user permission in `user_roundplay` table
        $userRoundplay = DB::table('user_roundplay')
            ->where([
                'user_id'      => $data['user_id'],
                'roundplay_id' => $data['roundplay_id']
            ])->first();

        if (!$userRoundplay) {
            return response()->json([
                'success' => false,
                'message' => 'ليس لديك إذن بالإجابة على هذا السؤال.'
            ], 403);
        }

        // Use a database transaction to ensure data consistency
        DB::transaction(function () use ($data, $correct, $userRoundplay) {
            Answer::create([
                'app'          => 'attendance',
                'roundplay_id' => $data['roundplay_id'],
                'question_id'  => $data['question_id'],
                'user_id'      => $data['user_id'],
                'ans'          => $data['ans'],
                'correct'      => $correct,
            ]);

            if ($correct) {
                DB::table('user_roundplay')
                    ->where([
                        'user_id'      => $data['user_id'],
                        'roundplay_id' => $data['roundplay_id']
                    ])
                    ->update(['mark' => $userRoundplay->mark + 1]);
            }
        });

        return response()->json([
            'success' => true,
            'message' => $correct
                ? 'إجابة صحيحة! تم تحديث درجاتك.'
                : 'إجابة خاطئة! حاول مرة أخرى.'
        ]);
    }



    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {

        $request->user()->fill($request->validated());

        $request->user()->save();

        return redirect()->route('distance_dashboard');
    }

    public function stateUpdate(Request $request)
    {
        $request->user()->state_id = $request->state_id;

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'state-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
