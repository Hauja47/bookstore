<?php

namespace App\Http\Controllers;

use App\Models\ReturnGoodsReceiptDetail;
use Illuminate\Http\Request;

class ReturnGoodsReceiptDetailController extends Controller
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
            'number' => 'required|numeric',
            'cost' => 'required|numeric',
            'total' => 'required|numeric'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnGoodsReceiptDetail  $returnGoodsReceiptDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnGoodsReceiptDetail $returnGoodsReceiptDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnGoodsReceiptDetail  $returnGoodsReceiptDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnGoodsReceiptDetail $returnGoodsReceiptDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnGoodsReceiptDetail  $returnGoodsReceiptDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnGoodsReceiptDetail $returnGoodsReceiptDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnGoodsReceiptDetail  $returnGoodsReceiptDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnGoodsReceiptDetail $returnGoodsReceiptDetail)
    {
        //
    }
}
