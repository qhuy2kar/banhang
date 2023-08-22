<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('home');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:1|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'sodt' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'khachang',
        ]);

        // return redirect()->route('login')->with('success', 'Đăng ký thành công!');
        return view('home');
    }
}
