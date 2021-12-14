<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Product;
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
        // ddd(request()->file('photo'));

        $attributes = request()->validate([
            'product_name' => 'required',
            'version' => 'required',
            'photo' => 'image',
            'brand_id' => 'required',
            'productable_type' => 'required'
        ]);

        if (strcmp(request('productable_type'), "Sách") == 0)
        {
            $attributes = array_merge($attributes, request()->validate([
                'author' => 'required',
                'publish_year' => 'required|numeric',
                'category_id' => 'required'
            ]));

            $book = Book::create([
                'category_id' => request('category_id'),
                'author' => $attributes['author'],
                'publish_year' => $attributes['publish_year']
            ]);

            if ($book)
            {
                // ddd(request()->file('photo')->store('photos'));
                $book->product()->save(new Product([
                    'name' => $attributes['product_name'],
                    'photo' => request()->file('photo')->store('photos'),
                    'brand_id' => $attributes['brand_id'],
                    'version' => $attributes['version'],
                ]));

                Alert::success('Thành công', 'Thêm sản phẩm mới thành công');

                return redirect(route('products.index'));
            }
            else
            {
                Alert::error('Thất bại', 'Thêm sản phẩm mới thất bại');
            }
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
        // dd(request());
        if (request('productable_type') == 'Sách')
        {
            request()->validate([
                'product_name' => 'required',

            ]);
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
        $product->delete();

        return back();
    }
}
