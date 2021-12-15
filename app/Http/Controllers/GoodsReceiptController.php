<?php

namespace App\Http\Controllers;

use App\Models\GoodsReceipt;
use Illuminate\Http\Request;

class GoodsReceiptController extends Controller
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
        return view('main.goods_receipts.add');
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
            // 'employee_id' => 'require',
            // 'provider_id' => 'required',
            'total_price' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GoodsReceipt  $goodsReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(GoodsReceipt $goodsReceipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoodsReceipt  $goodsReceipt
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodsReceipt $goodsReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GoodsReceipt  $goodsReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoodsReceipt $goodsReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceipt  $goodsReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoodsReceipt $goodsReceipt)
    {
        //
        $goodsReceipt->delete();

        return back()->withSuccess('Xóa Nhà cung cấp thành công');
    }
}
