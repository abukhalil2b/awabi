<?php

namespace App\Http\Controllers\distance;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function dashboard()
    {
        $correctAnswerCount = Answer::where('correct',1)
        ->count();

        $wrongAnswerCount = Answer::where('correct',0)
        ->count();

        $answers = Answer::where('correct',1)
        ->get();

        return view('admin.distance.answer.dashboard',compact('answers','correctAnswerCount','wrongAnswerCount'));
    }

 
}
