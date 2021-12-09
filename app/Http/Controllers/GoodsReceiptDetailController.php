<?php

namespace App\Http\Controllers;

use App\Models\GoodsReceiptDetail;
use Illuminate\Http\Request;

class GoodsReceiptDetailController extends Controller
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
        request()->validate([
            'quantity' => 'required|numeric',
            'cost' => 'required|numeric',
            'total' => 'required|numeric'
        ]);
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
     * @param  \App\Models\GoodsReceiptDetail  $goodsReceiptDetail
     * @return \Illuminate\Http\Response
     */
    public function show(GoodsReceiptDetail $goodsReceiptDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoodsReceiptDetail  $goodsReceiptDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodsReceiptDetail $goodsReceiptDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GoodsReceiptDetail  $goodsReceiptDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoodsReceiptDetail $goodsReceiptDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceiptDetail  $goodsReceiptDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoodsReceiptDetail $goodsReceiptDetail)
    {
        //
    }
}
