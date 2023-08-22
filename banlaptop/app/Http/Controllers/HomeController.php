<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Order;

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
        // dd($product);
        return view('home', compact('product'));
    }
    public function orderDetails()
    {
        // $orders = Order::where('user_id', auth()->user()->id)->get();
        $orders = Order::with('products')->where('user_id', auth()->user()->id)->get();
        return view('orderDetails', compact('orders'));
    }
}
