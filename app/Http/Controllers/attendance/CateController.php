<?php

namespace App\Http\Controllers\attendance;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Question;
use Illuminate\Http\Request;

class CateController extends Controller
{
    public function index()
    {
        $cates = Cate::where('app','attendance')
        ->where('status','active')
        ->get();

        return view('attendance.cate.index',compact('cates'));
    }

    public function create()
    {
        $cates = Cate::where('app','attendance')
        ->with('questions')
        ->get();

        $questions = Question::where(['status'=>'open','app'=>'attendance'])->get();

        return view('admin.attendance.cate.create',compact('cates','questions'));
    }

    public function store(Request $request)
    {
        Cate::create(['title'=>$request->title,'app'=>'attendance']);

        return back();
    }

   
}
