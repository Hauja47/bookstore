<?php

namespace App\Http\Controllers;

use App\Models\Stationery;
use Illuminate\Http\Request;

class StationeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'material' => 'required',
            'color' => 'required',
            'origin' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stationery  $stationery
     * @return \Illuminate\Http\Response
     */
    public function show(Stationery $stationery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stationery  $stationery
     * @return \Illuminate\Http\Response
     */
    public function edit(Stationery $stationery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stationery  $stationery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stationery $stationery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stationery  $stationery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stationery $stationery)
    {
        //
    }
}
