<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Product;
use App\Models\Parameter;
use App\Models\GoodsReceipt;
use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\DB;

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
            'provider' => 'required',
            'total_price' => 'required',
            'product_id' => 'required',
            'quantity' => 'required'
        ]);

        $product_id = request('product_id');
        $cost = request('cost');
        $total = request('total');
        $quantity = request('quantity');

        foreach ($product_id as $id)
        {
            $product = Product::find($id);
            if ($product->in_stock > Parameter::find(2)->value)
            {
                Alert::error('Sản phẩm '.$product->name.' của '.$product->brand->name.' có số lượng trong kho lớn hơn số lượng còn lại nhiều nhất trước khi nhập');
                return back();
            }
        }

        foreach ($quantity as $n)
        {
            $product = Product::find($n);
            if ($product->in_stock > Parameter::find(1)->value)
            {
                Alert::error('Sản phẩm '.$product->name.' của '.$product->brand->name.' có số lượng nhập nhỏ hơn số lượng nhập tối thiểu');
                return back();
            }
        }

        $goodsReceipt = GoodsReceipt::create([
            'employee_id' => auth()->user()->employee->id,
            'provider_id' => request('provider'),
            'total_price' => request('total_price')
        ]);

        $goodsReceipt->payment()->create([
            'employee_id' => $goodsReceipt->employee_id,
            'money' => $goodsReceipt->total_price,
            'note' => 'Phiếu chi tạo tự động cho DNH'.$goodsReceipt->id,
            'receiver_type' => 'Nhà cung cấp',
            'receiver_id' => $goodsReceipt->provider_id
        ]);

        $count = count($product_id);

        for ($i = 0; $i < $count; $i++)
        {
            $goodsReceipt->details()->create([
                'product_id' => $product_id[$i],
                'quantity' => $quantity[$i],
                'cost' => $cost[$i],
                'total' => $total[$i]
            ]);

            $product = Product::find($product_id[$i]);
            $product->update([
                'in_stock' => $product->in_stock + $quantity[$i],
                'price' => $cost[$i] * (1 + Parameter::find(5)->value / 100)
            ]);
        }

        return redirect(route('goods_receipts.index'))->withSuccess('Tạo đơn nhập hàng mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GoodsReceipt  $goods_receipt
     * @return \Illuminate\Http\Response
     */
    public function show(GoodsReceipt $goods_receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoodsReceipt  $goods_receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodsReceipt $goods_receipt)
    {
        //
        return view('main.goods_receipts.edit', ['goods_receipt' => $goods_receipt]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GoodsReceipt  $goods_receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoodsReceipt $goods_receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceipt  $goods_receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoodsReceipt $goods_receipt)
    {
        $details = $goods_receipt->details->all();
        foreach($details as $detail)
        {
            if (DB::table('invoice_details')
                    ->where('product_id', '=', $detail->product->id)
                    ->where('created_at', '>=' , $detail->created_at)
                    ->exists()
            )
            {
                Alert::error('Đã có hóa đơn tạo sau khi đơn nhập hàng này được tạo');
                return back();
            }
        }

        $goods_receipt->delete();
        $goods_receipt->payment()->delete();

        return back()->withSuccess('Xóa Đơn nhập hàng thành công');
    }
}
