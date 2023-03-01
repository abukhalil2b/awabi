<?php

namespace App\Http\Controllers\attendance;

use App\Http\Controllers\Controller;
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
        $roundplay = Roundplay::where('id',$roundplay->id)->with('answers')->first();
        return view('admin.attendance.roundplay.show',compact('roundplay'));
    }

    public function userRoundplay(Roundplay $roundplay)
    {
        return view('admin.attendance.user_roundplay',compact('roundplay'));
    }

    public function roundplayResult()
    {
        $roundplay = Roundplay::orderby('id','desc')
        ->where('status','active')
        ->first();

        if(!$roundplay){
            abort(403,'لايوجد جولة مفعلة');
        }

        return view('attendance.roundplay.result',compact('roundplay'));
    }


}
