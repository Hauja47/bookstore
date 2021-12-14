<?php

namespace App\Http\Controllers;

use App\Models\GoodsReceipt;
use App\Models\Provider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProviderController extends Controller
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
        return view('main.providers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Provider::create(request()->validate([
            'name' => 'required|min:2|max:255',
            'phone_number' => ['required', 'numeric', 'digits:10', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'email' => 'required|email',
            'address' => 'required'
        ])))
        {
            return redirect(route('providers.index'))->withSuccess('Thêm Nhà cung cấp thành công');
        }
        else
        {
            Alert::alert('Thêm Nhà cung cấp thất bại');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('main.providers.edit', ['provider' => $provider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        if ($provider->update(request()->validate([
            'name' => 'required|min:2|max:255',
            'phone_number' => ['required', 'numeric', 'digits:10', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'email' => 'required|email',
            'address' => 'required'
        ])))
        {
            return redirect(route('providers.index'))->withSuccess('Thay đổi thông tin Nhà cung cấp thành công');
        }
        else
        {
            Alert::alert('Thay đổi thông tin Nhà cung cấp thất bại');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        if (GoodsReceipt::where('provider_id', '=', $provider->id)->exists())
        {
            Alert::error('Có đơn nhập hàng đến từ nhà cung cấp đã chọn');
            return back();
        }

        $provider->delete();

        return back()->withSuccess('Xóa Nhà cung cấp thành công');
    }
}
