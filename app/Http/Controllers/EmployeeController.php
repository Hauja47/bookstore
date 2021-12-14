<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

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
            return redirect(route('employees.index'))->withSuccess('Thêm Nhân viên thành công');
        }
        else
        {
            Alert::alert('Thêm Nhân viên thất bại');
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
            // 'username' => [
            //     'required',
            //     Rule::unique('users')->ignore($employee->user)
            // ],
            // 'password' => 'required',
            'created_at' => 'required|date',
            'photo' => 'image'
        ]);

        if ($request->file('photo') == null) {
            $file = $employee->photo;
        } else {
            $file = $request->file('photo')->store('images');
        }

        $user = $employee->user;
        if ($attributes['password'] ?? null) {
            $user->update([
                'password' => $attributes['password'],
            ]);
        }

        if ($employee->update([
            'full_name' => $attributes['full_name'],
            'photo' => $file,
            'phone_number' => $attributes['phone_number'],
            'email' => $attributes['email'],
            'address' => $attributes['address'],
            'user_id' => $employee->user->update([
                // 'password' => $attributes['password'],
                'role' => $attributes['role']
            ]),
            'created_at' => $attributes['created_at']
        ]))
        {
            return redirect(route('employees.index'))->withSuccess('Thay đổi thông tin Nhân viên thành công');
        }
        else
        {
            return back()->with('errors', 'Thay đổi thông tin Nhân viên thất bại')->withInput();
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
            Alert::error('Không thể thực hiện hành động');
            return back();
        }

        if ($employee->delete())
        {
            $employee->user->delete();
            return back()->withSuccess('Xóa nhân viên thành công');
        }
        else
        {
            return back()->with('errors', ['Không thể xóa Nhân viên']);
        }
    }
}
