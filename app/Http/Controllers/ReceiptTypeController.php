<?php

namespace App\Http\Controllers;

use App\Models\ReceiptType;
use Illuminate\Http\Request;

class ReceiptTypeController extends Controller
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
            'name' => 'required|min:3|max:255|unique:receipt_types,name'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiptType  $receiptType
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiptType $receiptType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiptType  $receiptType
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiptType $receiptType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiptType  $receiptType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceiptType $receiptType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiptType  $receiptType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiptType $receiptType)
    {
        //
    }
}
