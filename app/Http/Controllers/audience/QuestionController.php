<?php

namespace App\Http\Controllers\audience;

use App\Http\Controllers\Controller;
use App\Models\AudienceQuestion;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        $question = AudienceQuestion::first();

        return view('admin.audience.question.create',compact('question'));
    }

    public function store(Request $request)
    {
        AudienceQuestion::create([
            'content' =>$request->content,

            'A' =>$request->A,

            'B' =>$request->B,

            'C' =>$request->C,

            'A' =>$request->A,

            'ans' =>$request->ans,

        ]);

        return back();
    }
}
