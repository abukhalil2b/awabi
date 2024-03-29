<?php

namespace App\Http\Controllers\audience;

use App\Http\Controllers\Controller;
use App\Models\Audience;
use Illuminate\Http\Request;

class AudienceController extends Controller
{
    public function dashboard()
    {
        $audiences = Audience::where('selected', 0)->get();

        return view('admin.audience.dashboard', compact('audiences'));
    }

    public function storeSelected(Request $request)
    {

        Audience::where('id', $request->audienceId)
            ->update(['selected' => 1]);

        return back();
    }


    public function index()
    {
        $audiences = Audience::latest('selected')->get();

        return view('admin.audience.index', compact('audiences'));
    }

    public function delete()
    {
        Audience::truncate();

        return back();
    }
}
