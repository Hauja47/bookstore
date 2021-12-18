<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function store()
    {
        if (auth()->check()) {
            return back();
        }

        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' => 'Tên đăng nhập hoặc mật khẩu không tồn tại!',
                'password' => 'Tên đăng nhập hoặc mật khẩu không tồn tại!'
            ]);
        }

        session()->regenerate();

        auth()->user()->employee->update(['is_working' => 1]);

        return redirect(route('dashboard'));
    }

    public function create()
    {
        return view('main.login');
    }

    public function destroy()
    {
        auth()->user()->employee->update(['is_working' => 0]);

        auth()->logout();

        return redirect('/');
    }
}
