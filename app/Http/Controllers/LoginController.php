<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:8']
        ],
        [
            'email.required' => 'Bạn phải nhập địa chỉ email',
            'email.email' => 'Email của bạn chưa hợp lệ',
            'password.required' => 'Bạn phải nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 8 ký tự'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('loginform')->with('status','Email hoặc mật khẩu sai');
        }
    }

    public function logout()
    { 
        Auth::guard('admin')->logout();
        return redirect()->route('loginform');
    }
}
