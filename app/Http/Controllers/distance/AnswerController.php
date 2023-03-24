<?php

namespace App\Http\Controllers\distance;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function dashboard()
    {

        $answers = Answer::where(['correct' => 1, 'app' => 'distance'])
            ->get();

        return view('admin.distance.answer.dashboard', compact('answers'));
    }

    public function deleteAllAnswers(Request $request)
    {
        if ($request->code == 1234) {
            Answer::where(['app' => 'distance'])->delete();
        }

        return back();
    }
}
