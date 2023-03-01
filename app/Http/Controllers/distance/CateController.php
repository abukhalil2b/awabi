<?php

namespace App\Http\Controllers\distance;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;

class CateController extends Controller
{

    public function create()
    {
        $cates = Cate::where('app','distance')
        ->with('questions')
        ->get();

        return view('admin.distance.cate.create',compact('cates'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        Cate::create(['title'=>$request->title,'app'=>'distance','status'=>'disable']);

        return back();
    }

    public function active(Cate $cate)
    {
        Cate::where(['app'=>'distance','status'=>'active'])->update(['status'=>'disable']);

        $cate->update(['status'=>'active']);

        return back();
    }
}
