<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Parameter $parameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        //
        return view('main.settings.regulation');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parameter $parameter)
    {
        // dd(request());
        request()->validate([
            'min_imported_number' => 'required|numeric',
            'max_in_stock_number_before_import' => 'required|numeric',
            'max_debt' => 'required|numeric',
            'min_in_stock_number_after_sale' => 'required|numeric',
            'rate_price' => 'required|numeric',
        ]);

        $p = Parameter::all();

        $p[0]->update([
            'value' => request('min_imported_number')
        ]);

        $p[1]->update([
            'value' => request('max_in_stock_number_before_import')
        ]);

        $p[2]->update([
            'value' => request('max_debt')
        ]);

        $p[3]->update([
            'value' => request('min_in_stock_number_after_sale')
        ]);

        $p[4]->update([
            'value' => request('rate_price')
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameter $parameter)
    {
        //
    }
}
