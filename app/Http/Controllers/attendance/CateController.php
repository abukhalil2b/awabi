<?php

namespace App\Http\Controllers\attendance;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;

class CateController extends Controller
{
    public function index()
    {
        $cates = Cate::where('app','attendance')->get();

        return view('attendance.cate.index',compact('cates'));
    }

    public function create()
    {
        $cates = Cate::where('app','attendance')
        ->with('questions')
        ->get();

        return view('admin.attendance.cate.create',compact('cates'));
    }

    public function store(Request $request)
    {
        Cate::create(['title'=>$request->title,'app'=>'attendance']);

        return back();
    }
}
