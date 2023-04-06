<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{


    public function lotDashboard()
    {
        $correctAnswers = Answer::where(['app'=>'distance','correct'=>1])->pluck('phone')->toArray();

        $correctAnswers = array_map('intval', $correctAnswers);

        $prevWinners = Winner::pluck('phone')->toArray();

        $prevWinners = array_map('intval', $prevWinners);

        $correctAnswers = json_encode($correctAnswers);

        $prevWinners = json_encode($prevWinners);

        return view('admin.distance.lot.dashboard',compact('correctAnswers','prevWinners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function show(Winner $winner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function edit(Winner $winner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Winner $winner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Winner $winner)
    {
        //
    }
}
