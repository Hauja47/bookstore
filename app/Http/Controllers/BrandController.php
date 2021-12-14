<?php

namespace App\Http\Controllers;

use Alert;
use Validator;
use App\Models\Book;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'brand_name' => ['required' ,'max:255' ,'unique:brands,name']
        ]);
        if ($validator->fails())
        {
            Alert::error($validator->messages()->all()[0]);

            return back();
        }

        if (Brand::create([
            'name' => request('brand_name')
        ]))
        {
            return back()->withSuccess('Thêm Nhãn hiệu/Nhà xuất bản thành công');
        }
        else {
            Alert::error('Thêm Nhãn hiệu/Nhà xuất bản thất bại');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('main.products.option', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validator = Validator::make(request()->all(), [
            'brand_name' => ['required' ,'max:255' ,'unique:brands,name']
        ]);
        if ($validator->fails())
        {
            Alert::error($validator->messages()->all()[0]);

            return back();
        }

        if ($brand->update([
            'name' => request('brand_name')
        ]))
        {
            return back()->withSuccess('Thay đổi thông tin Nhãn hiệu/Nhà xuất bản thành công');
        }
        else {
            Alert::error('Thay đổi thông tin Nhãn hiệu/Nhà xuất bản thất bại');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if (Product::where('brand_id', '=', $brand->id)->exists())
        {
            Alert::error('Có sản phẩm thuộc Nhãn hiệu/Nhà xuất bản');

            return back();
        }
        $brand->delete();

        return back()->withSuccess('Xóa Nhãn hiệu/Nhà xuất bản thành công');
    }
}
