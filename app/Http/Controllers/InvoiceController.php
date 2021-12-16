<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
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
        return view('main.invoices.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request());
        request()->validate([
            'customer_id' => 'required',
            'total' => 'required',
            'paid' => 'required',
            'balance' => 'required',
            'total_price' => 'required',
            'quantity' => 'required',
            'product_id' => 'required'
        ]);

        // if (Parameter::find(3)->value > 0 && Customer::find(request('customer_id'))->debt >= Parameter::find(3)->value)
        if (Customer::find(request('customer_id'))->debt > Parameter::find(3)->value)
        {
            Alert::error('Số tiền nợ của khách hàng lớn hơn số tiền nợ tối đa');
            return back();
        }

        // if (Parameter::find(3)->value > 0 && request('balance') + Customer::find(request('customer_id'))->debt >= Parameter::find(3)->value)
        if (request('balance') + Customer::find(request('customer_id'))->debt > Parameter::find(3)->value)
        {
            Alert::error('Số tiền nợ của khách hàng sau khi mua lớn hơn số tiền nợ tối đa');
            return back();
        }

        $product_id = request('product_id');
        $quantity = request('quantity');
        $count = count($product_id);

        for ($i = 0; $i < $count; $i++)
        {
            $p = Product::find($product_id[$i]);
            if (Parameter::find(4)->value > 0 && (($p->in_stock - $quantity[$i]) < Parameter::find(4)->value))
            {
                Alert::error('Số lượng sản phẩm '.$p->name.' sau bán ít hơn số lượng tối thiểu qui định');
                return back();
            }

            if ($p->in_stock - $quantity[$i] < 0)
            {
                Alert::error('Số lượng sản phẩm '.$p->name.' sau bán nhỏ hơn 0');
                return back();
            }
        }

        $invoice = Invoice::create([
            'employee_id' => auth()->user()->employee->id,
            'customer_id' => request('customer_id'),
            'total' => request('total_price'),
            'paid' => request('paid'),
            'balance' => request('balance')
        ]);

        $invoice->receipt()->create([
            'employee_id' => $invoice->employee_id,
            'money' => $invoice->paid,
            'note' => 'Phiếu chi tạo tự động cho HD'.$invoice->id,
            'giver_type' => 'Khách hàng',
            'giver_id' => $invoice->customer_id,
            'can_delete' => 0,
            'can_edit_note' => 0,
        ]);

        for ($i = 0; $i < $count; $i++)
        {
            $invoice->details()->create([
                'product_id' => $product_id[$i],
                'quantity' => $quantity[$i],
                'cost' => Product::find($product_id[$i])->price,
                'total' => request('total')[$i]
            ]);

            $product = Product::find($product_id[$i]);
            $product->update([
                'in_stock' => $product->in_stock - $quantity[$i],
            ]);
        }

        return redirect(route('invoices.index'))->withSuccess('Tạo hóa đơn mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
        return view('main.invoices.edit', ['invoice'=> $invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
        $details = $invoice->details->all();

        foreach ($details as $detail)
        {
            $detail->product->update([
                'in_stock' => $detail->product->in_stock + $detail->quantity,
            ]);
        }
        $invoice->customer()->update([
            'debt' => $invoice->customer->debt + $invoice->balance
        ]);
        $invoice->delete();
        $invoice->receipt()->delete();

        return back();
    }
}
