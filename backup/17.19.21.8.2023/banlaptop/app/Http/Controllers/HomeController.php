<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class HomeController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
    }
    public function index()
    {
        $product = Product::get();
        return view('home', compact('product'));
    }
}
