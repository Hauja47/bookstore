<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
        return view('main.products.option');

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
            'category_name' => ['required' ,'max:255' ,'unique:brands,name']
        ]);
        if ($validator->fails())
        {
            Alert::error($validator->messages()->all()[0]);

            return back();
        }

        if (Category::create([
            'name' => request('category_name')
        ]))
        {
            return back()->withSuccess('Thêm Thể loại thành công');
        }
        else {
            Alert::error('Thêm Thể loại thất bại');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //

        return view('main.products.option', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make(request()->all(), [
            'category_name' => [
                'required',
                'max:255',
                Rule::unique('categories')->ignore($category)
            ]
        ]);
        if ($validator->fails())
        {
            Alert::error($validator->messages()->all()[0]);

            return back();
        }

        if ($category->update([
            'name' => request('category_name')
        ]))
        {
            return back()->withSuccess('Thay đổi thông tin Thể loại thành công');
        }
        else {
            Alert::error('Thay đổi thông tin Thể loại thất bại');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Book::where('category_id', '=', $category->id)->exists())
        {
            Alert::error('Có sản phẩm thuộc thể loại');

            return back();
        }
        $category->delete();

        return back()->withSuccess('Xóa Thể loại thành công');
    }
}
