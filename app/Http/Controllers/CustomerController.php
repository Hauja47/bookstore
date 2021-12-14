<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
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
        return view('main.customers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Customer::create(request()->validate([
            'full_name' => 'required|min:2|max:191',
            'phone_number' => ['required', 'numeric', 'digits:10', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/', 'unique:customers,phone_number'],
            'email' => 'required|email|unique:customers,email',
            'address' => 'required'
        ])))
        {
            return redirect(route('customers.index'))->withSuccess('Thêm Khách hàng thành công');
        }
        else
        {
            Alert::alert('Thêm Khách hàng thất bại');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('main.customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        if ($customer->update(request()->validate([
            'full_name' => 'required|min:2|max:255',
            'phone_number' => [
                'required',
                'numeric',
                'digits:10',
                'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/',
                Rule::unique('customers')->ignore($customer)
            ],
            'email' => ['required', 'email', Rule::unique('customers')->ignore($customer)],
            'address' => 'required'
        ])))
        {
            return redirect(route('customers.index'))->withSuccess('Thay đổi thông tin Khách hàng thành công');
        }
        else
        {
            Alert::alert('Thay đổi thông tin Khách hàng thất bại');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //TODO
        $customer->delete();

        return back()->withSuccess('Xóa Khách hàng thành công');
    }
}
