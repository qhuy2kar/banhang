<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function showHomeForm()
    {
        return view('admin.index');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
