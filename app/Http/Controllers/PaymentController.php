<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Provider;
use Illuminate\Http\Request;

class PaymentController extends Controller
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
        return view('main.payments.add');
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
            'receiver_type' => 'required',
            'note' => 'required',
        ]);

        if (request('receiver_customer_id') == null && request('receiver_provider_id') == null && request('receiver_employee_id') == null)
        {
            Alert::error('Tên đối tượng không được bỏ trống!');
            return back();
        }

        if (request('receiver_type') == 'Khách hàng')
        {
            $payment = Customer::find(request('receiver_customer_id'))->payments()->create([
                'employee_id' => auth()->user()->employee->id,
                'money' => request('money'),
                'note' => request('note')
            ]);
        }
        else if (request('receiver_type') == 'Nhân viên')
        {
            $payment = Employee::find(request('receiver_employee_id'))->paymentReceiver()->create([
                'employee_id' => auth()->user()->employee->id,
                'money' => request('money'),
                'note' => request('note')
            ]);
        }
        else if (request('receiver_type') == 'Nhà cung cấp')
        {
            $payment = Provider::find(request('receiver_provider_id'))->payments()->create([
                'employee_id' => auth()->user()->employee->id,
                'money' => request('money'),
                'note' => request('note')
            ]);
        }

        if ($payment)
        {
            return redirect(route('payments.index'))->withSuccess('Tạo phiếu chi thành công');
        }
        return redirect(route('payments.index'))->withErrors('Tạo phiếu chi thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
        return view('main.payments.edit', ['payment' => $payment]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        Alert::alert('Xóa Phiếu chi thành công');
        return back();
    }
}
