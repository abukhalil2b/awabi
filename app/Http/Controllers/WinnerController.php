<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
   
    public function index()
    {
        $winners = Winner::all();

        return view('admin.distance.winner.index',compact('winners'));
    }

    public function lotDashboard()
    {
        return view('admin.distance.lot.dashboard');
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
