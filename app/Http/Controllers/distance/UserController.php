<?php

namespace App\Http\Controllers\distance;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.distance.user.create');
    }

    public function show($id)
    {
        $user = User::where(['app'=>'distance','id'=>$id])
        ->select('id','app','name','state_id')
        ->firstOrFail();
        return view('admin.distance.user.show',compact('user'));
    }

}
