<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('order', compact('product'));
    }
    public function store(Request $request)
    {
        // Lấy thông tin người dùng đã đăng nhập
        $user = Auth::user();

        // Lấy thông tin sản phẩm
        $product = Product::findOrFail($request->input('product_id'));

        // Tính toán tổng tiền đơn hàng
        $totalPrice = $product->price * $request->input('quantity');

        // Tạo đơn đặt hàng mới
        $order = new Order();
        $order->user_id = $user->id;
        $order->product_id = $product->id;
        $order->quantity = $request->input('quantity');
        $order->total_price = $totalPrice;
        // Lưu các thông tin khác của đơn đặt hàng
        $order->save();

        // Thực hiện các tác vụ khác (ví dụ: gửi email xác nhận đơn đặt hàng)

        return redirect()->back()->with('success', 'Đặt hàng thành công!');
    }
}
