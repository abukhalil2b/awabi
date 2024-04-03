<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Cate;
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

    public function attendanceDashboard(Request $request)
    {
        $user = $request->user();

        $roundplay = Roundplay::where(['status' => 'active'])
            ->latest('id')->first();

        if ( ! $roundplay) {

            return view('attendance.roundplay.no_active_roundplay');
        }

        //check permision
        $hasPermission = DB::table('user_roundplay')
            ->where(['user_id' => $user->id, 'roundplay_id' => $roundplay->id])
            ->first();

            if( ! $hasPermission){
                return view('attendance.roundplay.no_permission_on_roundplay',compact('user'));
            }
        //set answer to null
        $answer = null;

        $question = Question::where(['app' => 'attendance', 'status' => 'open'])->first();

        if ($question) {

            $answer = Answer::where([
                'app' => 'attendance',
                'question_id' => $question->id,
                'user_id' => $user->id
            ])->first();
        }

        return view('attendance_dashboard', compact('question', 'answer','roundplay'));
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
