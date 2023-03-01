<?php

namespace App\Http\Controllers\distance;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    


    public function create(Cate $cate)
    {
        $questions = Question::where('cate_id',$cate->id)->get();

        return view('admin.distance.question.create',compact('cate','questions'));
    }

    public function show(Question $question)
    {
        $question->update(['status'=>'open']);
        
        return view('distance.question.show',compact('question'));
    }

    public function close(Question $question)
    {
        return $question->update(['status'=>'close']);
    }

    public function edit(Question $question)
    {
        return view('admin.distance.question.edit',compact('question'));
    }

    public function update(Request $request,Question $question)
    {
        $fields = $request->validate([
            'content'=>'required',
            'A'=>'required',
            'B'=>'required',
            'C'=>'required',
            'D'=>'required',
            'ans'=>'required'
        ]);

        $question->update($fields);
        
        return back();
    }

    public function delete(Question $question)
    {
        $question->delete();

        return back();
    }

}
