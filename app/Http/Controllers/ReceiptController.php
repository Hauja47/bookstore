<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Parameter;
use App\Models\Provider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReceiptController extends Controller
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
        return view('main.receipts.add');

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
            'giver_type' => 'required',
            'note' => 'required',
        ]);

        if (request('giver_customer_id') == null && request('giver_provider_id') == null && request('giver_employee_id') == null)
        {
            Alert::error('Tên đối tượng không được bỏ trống!');
            return back();
        }

        $invoice = Invoice::find(request('invoice_id'));
        if (request('invoice_id') && request('giver_type') == 'Khách hàng')
        {
            if (!$invoice)
            {
                Alert::error('Hóa đơn HD'.request('invoice_id').' không tồn tại');
                return back();
            }

            if ($invoice->balance < request('money'))
            {
                Alert::error('Số tiền khách hàng nộp nhiều hơn số tiền còn lại của hóa đơn');
                return back();
            }

            if (Customer::find(request('giver_customer_id'))->debt - request('money') > Parameter::find(3)->value)
            {
                Alert::error('Số tiền nợ sau khi nộp của khách hàng lớn hơn số tiền nợ tối đa');
                return back();
            }
        }

        if (request('giver_type') == 'Khách hàng')
        {
            $customer = Customer::find(request('giver_customer_id'));
            $receipt = $customer->receipts()->create([
                'employee_id' => auth()->user()->employee->id,
                'money' => request('money'),
                'note' => $invoice ? request('note').'. Phiếu thu tiền còn lại cho hóa đơn HD'.$invoice->id : request('note')
            ]);

            if (request('invoice_id'))
            {
                $receipt->update([
                    'invoice_id' => request('invoice_id')
                ]);

                $customer->update([
                    'debt' => $customer->debt - request('money')
                ]);

                $invoice->update([
                    'paid' => $invoice->paid + request('money'),
                    'balance' => $invoice->balance - request('money')
                ]);
            }
        }
        else if (request('giver_type') == 'Nhân viên')
        {
            $receipt = Employee::find(request('giver_employee_id'))->receiptGiver()->create([
                'employee_id' => auth()->user()->employee->id,
                'money' => request('money'),
                'note' => request('note'),
            ]);
        }
        else if (request('giver_type') == 'Nhà cung cấp')
        {
            $receipt = Provider::find(request('giver_provider_id'))->receipts()->create([
                'employee_id' => auth()->user()->employee->id,
                'money' => request('money'),
                'note' => request('note')
            ]);
        }

        if ($receipt)
        {
            return redirect(route('receipts.index'))->withSuccess('Tạo phiếu thu thành công');
        }
        return redirect(route('receipts.index'))->withErrors('Tạo phiếu thu thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
        return view('main.receipts.edit', ['receipt' => $receipt]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        request()->validate([
            'money' => 'required',
            'text' => 'required',
        ]);

        if ($receipt->invoice_id)
        {
            $customer = $receipt->giver;

            if ($customer->debt + $receipt->money < request('money'))
            {
                Alert::error('Số tiền nợ sau khi thay đổi của khách hàng nhỏ hơn số tiền nộp');
                return back();
            }

            if ($customer->debt + $receipt->money - request('money') > Parameter::find(3)->value)
            {
                Alert::error('Số tiền nợ sau khi thay đổi của khách hàng lớn hơn số tiền nợ tối đa');
                return back();
            }

            $customer->update([
                'debt' => $customer->debt + $receipt->money - request('money')
            ]);

            $invoice = $receipt->invoice;
            $invoice->update([
                'paid' => $invoice->paid - $receipt->money + request('money'),
                'balance' => $invoice->balance + $receipt->money - request('money')
            ]);
        }

        if ($receipt->update([
            'money' => request('money'),
            'note' => request('text')
        ]))
        {
            return redirect(route('receipts.index'))->withSuccess('Thay đổi phiếu thu thành công');
        }
        return redirect(route('receipts.index'))->withErrors('Thay đổi phiếu thu thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        if ($receipt->invoice_id)
        {
            $customer = $receipt->giver;

            if ($customer->debt + $receipt->money > Parameter::find(3)->value)
            {
                Alert::error('Số tiền nợ sau khi xóa của khách hàng lớn hơn số tiền nợ tối đa');
                return back();
            }

            $customer->update([
                'debt' => $customer->debt + $receipt->money
            ]);

            $invoice = $receipt->invoice;
            $invoice->update([
                'paid' => $invoice->paid - $receipt->money,
                'balance' => $invoice->balance + $receipt->money
            ]);
        }

        $receipt->delete();
        return back()->withSuccess('Xóa phiếu thu thành công');
    }
}
