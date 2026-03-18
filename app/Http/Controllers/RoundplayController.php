<?php

namespace App\Http\Controllers;

use App\Models\Roundplay;
use Illuminate\Http\Request;

class RoundplayController extends Controller
{
    public function create()
    {
        return view('admin.attendance.roundplay.create');
    }

    public function show(Roundplay $roundplay)
    {
        $roundplay = Roundplay::where('id', $roundplay->id)->with('answers')->first();
        return view('admin.attendance.roundplay.show', compact('roundplay'));
    }

    public function userRoundplay(Roundplay $roundplay)
    {
        return view('admin.attendance.user_roundplay', compact('roundplay'));
    }

    public function roundplayResult()
    {
        $roundplay = Roundplay::orderby('id', 'desc')
            ->where('status', 'active')
            ->first();

        if (!$roundplay) {
            abort(403, 'لايوجد جولة مفعلة');
        }

        $roundplayUsers = $roundplay->users()->orderby('mark', 'DESC')->get();
        // return $roundplayUsers;
        return view('attendance.roundplay.result', compact('roundplay', 'roundplayUsers'));
    }


    public function updateMark(Request $request)
    {
        $request->validate([
            'roundplay_id' => ['required', 'exists:roundplays,id'],
            'user_id' => ['required', 'exists:users,id'],
            'mark' => ['nullable', 'integer', 'min:0'],
        ]);

        $roundplay = Roundplay::findOrFail($request->roundplay_id);

        // Ensure user belongs to this roundplay
        $exists = $roundplay->users()
            ->where('user_id', $request->user_id)
            ->exists();

        if (!$exists) {
            return response()->json([
                'status' => false,
                'message' => 'User not in this round'
            ], 422);
        }

        $roundplay->users()->updateExistingPivot(
            $request->user_id,
            ['mark' => $request->mark ?? 0]
        );

        return response()->json([
            'status' => true,
            'message' => 'updated'
        ]);
    }
}
