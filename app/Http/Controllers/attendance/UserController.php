<?php

namespace App\Http\Controllers\attendance;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.attendance.user.create');
    }

    public function show($id)
    {
        $user = User::where(['app'=>'attendance','id'=>$id])
        ->select('id','app','name','state_id')
        ->firstOrFail();
        
        return view('admin.attendance.user.show',compact('user'));
    }

}
