<?php

namespace App\Http\Controllers\attendance;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Roundplay;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function questionAnswerIndex(Question $question)
    {
        $answers =  $question->answers;

        return view('attendance.question.answer.index', compact('answers', 'question'));
    }

    public function roundplayAnswerIndex()
    {
        $roundplay = Roundplay::whereStatus('active')->latest('id')->first();

        if(! $roundplay ){
            abort(404);
        }

        $questionIds = Answer::where('roundplay_id', $roundplay->id)->distinct('question_id')->pluck('question_id');

        $answers = Question::whereIn('id', $questionIds)
            ->with('answers')
            ->get();

        return view('attendance.roundplay.answer.index', compact('answers','roundplay'));
    }


}
