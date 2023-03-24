<?php

namespace App\Http\Controllers\audience;

use App\Http\Controllers\Controller;
use App\Models\AudienceQuestion;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(AudienceQuestion $audienceQuestion)
    {
        return view('admin.audience.question.show', compact('audienceQuestion'));
    }

    public function create()
    {
        $questions = AudienceQuestion::all();

        return view('admin.audience.question.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'A' => 'required',
            'B' => 'required',
            'C' => 'required',
            'ans' => 'required',
        ]);

        AudienceQuestion::create([
            'content' => $request->content,

            'A' => $request->A,

            'B' => $request->B,

            'C' => $request->C,

            'D' => $request->D,

            'ans' => $request->ans,

        ]);

        return back();
    }
}
