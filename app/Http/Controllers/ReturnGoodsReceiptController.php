<?php

namespace App\Http\Controllers;

use App\Models\ReturnGoodsReceipt;
use Illuminate\Http\Request;

class ReturnGoodsReceiptController extends Controller
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
            'total' => 'required|numeric'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnGoodsReceipt  $returnGoodsReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnGoodsReceipt $returnGoodsReceipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnGoodsReceipt  $returnGoodsReceipt
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnGoodsReceipt $returnGoodsReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnGoodsReceipt  $returnGoodsReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnGoodsReceipt $returnGoodsReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnGoodsReceipt  $returnGoodsReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnGoodsReceipt $returnGoodsReceipt)
    {
        //
    }
}
