<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('home');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            // return redirect()->intended('/sinhvien');
            $user = Auth::user();
            if ($user->role === 'khachhang') {
                return redirect()->intended('/home');
            } elseif ($user->role === 'quantri') {
                // return redirect()->intended('/admin');
                // return view('admin.index');
                return redirect()->route('admin.home');
            }
        } else {
            // Đăng nhập không thành công
            return redirect()->back()->withErrors([
                'email' => 'Email hoặc mật khẩu không chính xác',
            ]);
        }
    }
}
