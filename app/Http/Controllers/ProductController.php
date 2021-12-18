<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\GoodsReceipt;
use App\Models\GoodsReceiptDetail;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\ReturnGoodsReceiptDetail;
use App\Models\Stationery;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('main.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'product_name' => 'required',
            'version' => 'required',
            'photo' => 'image',
            'brand_id' => 'required',
            'productable_type' => 'required'
        ]);

        if ($request->file('photo') == null) {
            $file = null;
        } else {
            $file = $request->file('photo')->store('images');
        }

        if (request('productable_type') == "Sách")
        {
            $attributes = array_merge($attributes, request()->validate([
                'author' => 'required',
                'publish_year' => 'required|numeric|min:1901|max:2155',
                'category_id' => 'required'
            ]));

            $product = Book::create([
                'category_id' => request('category_id'),
                'author' => $attributes['author'],
                'publish_year' => $attributes['publish_year']
            ]);
        }
        else if (request('productable_type') == "Văn phòng phẩm")
        {
            $attributes = array_merge($attributes, request()->validate([
                'material' => 'required',
                'color' => 'required',
                'origin' => 'required'
            ]));

            $product = Stationery::create([
                'material' => $attributes['material'],
                'color' => $attributes['color'],
                'origin' => $attributes['origin']
            ]);
        }

        if ($product)
        {
            $product->product()->create([
                'name' => $attributes['product_name'],
                'photo' => $file,
                'brand_id' => $attributes['brand_id'],
                'version' => $attributes['version'],
            ]);

            return redirect(route('products.index'))->withSuccess('Thêm sản phẩm mới thành công');
        }
        else
        {
            return back()->withInput()->withErrors('Thất bại', 'Thêm sản phẩm mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('main.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $attributes = request()->validate([
            'product_name' => 'required',
            'version' => 'required',
            'photo' => 'image',
            'brand_id' => 'required',
            'productable_type' => 'required'
        ]);

        if ($request->file('photo') == null) {
            $file = $product->photo;
        } else {
            $file = $request->file('photo')->store('images');
        }

        if (request('productable_type') == "Sách")
        {
            $attributes = array_merge($attributes, request()->validate([
                'author' => 'required',
                'publish_year' => 'required|numeric|min:1901|max:2155',
                'category_id' => 'required'
            ]));

            $product->productable->update([
                'category_id' => request('category_id'),
                'author' => $attributes['author'],
                'publish_year' => $attributes['publish_year']
            ]);
        }
        else if (request('productable_type') == "Văn phòng phẩm")
        {
            $attributes = array_merge($attributes, request()->validate([
                'material' => 'required',
                'color' => 'required',
                'origin' => 'required'
            ]));

            $product->productable->update([
                'material' => $attributes['material'],
                'color' => $attributes['color'],
                'origin' => $attributes['origin']
            ]);
        }

        if ($product->update([
            'name' => $attributes['product_name'],
            'photo' => $file,
            'brand_id' => $attributes['brand_id'],
            'version' => $attributes['version'],
        ]))
        {
            return redirect(route('products.index'))->withSuccess('Thay đổi thông tin sản phẩm mới thành công');
        }
        else
        {
            return back()->withInput()->withErrors('Thất bại', 'Thay đổi thông tin sản phẩm mới thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (GoodsReceiptDetail::where('product_id', '=', $product->id)->exists())
        {
            Alert::error('Có đơn nhập hàng cho sản phẩm đã chọn');
            return back();
        }
        if (InvoiceDetail::where('product_id', '=', $product->id)->exists())
        {
            Alert::error('Có hóa đơn cho sản phẩm đã chọn');
            return back();
        }
        if (ReturnGoodsReceiptDetail::where('product_id', '=', $product->id)->exists())
        {
            Alert::error('Có đơn trả hàng cho sản phẩm đã chọn');
            return back();
        }

        $product->productable->delete();
        $product->delete();

        return back()->withSuccess('Xóa sản phẩm thành công');
    }
}
