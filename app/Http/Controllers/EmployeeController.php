<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class EmployeeController extends Controller
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
        return view('main.employees.add');
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
            'full_name' => 'required|min:2|max:191',
            'phone_number' => ['required', 'numeric', 'digits:10', 'unique:employees,phone_number', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'email' => 'required|email|unique:employees,email',
            'address' => 'required',
            'role' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'created_at' => 'required|date',
            'photo' => 'image'
        ]);

        if ($request->file('photo') == null) {
            $file = null;
        } else {
            $file = $request->file('photo')->store('images');
        }

        if (Employee::create([
            'full_name' => $attributes['full_name'],
            'photo' => $file,
            'phone_number' => $attributes['phone_number'],
            'email' => $attributes['email'],
            'address' => $attributes['address'],
            'user_id' => User::create([
                'username' => $attributes['username'],
                'password' => $attributes['password'],
                'role' => $attributes['role']
            ])->id,
            'created_at' => $attributes['created_at']
        ]))
        {
            return redirect(route('employees.index'))->withSuccess('Th??m Nh??n vi??n th??nh c??ng');
        }
        else
        {
            Alert::alert('Th??m Nh??n vi??n th???t b???i');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('main.employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $attributes = request()->validate([
            'full_name' => 'required|min:2|max:191',
            'phone_number' => [
                'required',
                'numeric',
                'digits:10',
                Rule::unique('employees')->ignore($employee),
                'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('employees')->ignore($employee)
            ],
            'address' => 'required',
            'role' => 'required',
            'created_at' => 'required|date',
            'photo' => 'image'
        ]);

        if ($request->file('photo') == null) {
            $file = $employee->photo;
        } else {
            $file = $request->file('photo')->store('images');
        }

        $user = $employee->user;
        if (request('password')) {
            $user->update([
                'password' => request('password'),
            ]);
        }

        $user->update([
            // 'password' => $attributes['password'],
            'role' => $attributes['role']
        ]);

        if ($employee->update([
            'full_name' => $attributes['full_name'],
            'photo' => $file,
            'phone_number' => $attributes['phone_number'],
            'email' => $attributes['email'],
            'address' => $attributes['address'],
            'created_at' => $attributes['created_at']
        ]))
        {
            return redirect(route('employees.index'))->withSuccess('Thay ?????i th??ng tin Nh??n vi??n th??nh c??ng');
        }
        else
        {
            return back()->with('errors', 'Thay ?????i th??ng tin Nh??n vi??n th???t b???i')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        // dd($employee);
        if ($employee->user == auth()->user())
        {
            Alert::error('Kh??ng th??? th???c hi???n h??nh ?????ng');
            return back();
        }

        if ($employee->goodsReceipts()->exists())
        {
            Alert::error('Kh??ng th??? x??a Nh??n vi??n', 'Nh??n vi??n c?? li??n quan ?????n ????n nh???p h??ng');
            return back();
        }
        if ($employee->invoices()->exists())
        {
            Alert::error('Kh??ng th??? x??a Nh??n vi??n', 'Nh??n vi??n c?? li??n quan ?????n H??a ????n');
            return back();
        }
        if ($employee->returnGoodsReceipts()->exists())
        {
            Alert::error('Kh??ng th??? x??a Nh??n vi??n', 'Nh??n vi??n c?? li??n quan ?????n Phi???u tr??? h??ng');
            return back();
        }
        if ($employee->receipts()->exists() || $employee->receiptGiver()->exists())
        {
            Alert::error('Kh??ng th??? x??a Nh??n vi??n', 'Nh??n vi??n c?? li??n quan ?????n Phi???u thu');
            return back();
        }
        if ($employee->payments()->exists() || $employee->paymentReceiver()->exists())
        {
            Alert::error('Kh??ng th??? x??a Nh??n vi??n', 'Nh??n vi??n c?? li??n quan ?????n Phi???u chi');
            return back();
        }

        if ($employee->delete())
        {
            $employee->user->delete();
            return back()->withSuccess('X??a nh??n vi??n th??nh c??ng');
        }
        else
        {
            return back()->with('errors', ['Kh??ng th??? x??a Nh??n vi??n']);
        }
    }
}
