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
        // $order = Order::findOrFail();

        // return redirect()->route('orders.bill', ['orderId' => $orderId, 'userName' => $userName, 'productName' => $productName])->with('success', 'Đặt hàng thành công!');
        return redirect()->route('orders.bill',['orderId' => $order->id])->with('success', 'Đặt hàng thành công!');

        // $orderId = $order->id;
        // $order = Order::join('users', 'orders.user_id', '=', 'users.id')
        // ->join('products', 'orders.product_id', '=', 'products.id')
        // ->select('orders.*', 'users.name', 'products.name as product_name')
        // ->findOrFail($orderId);
        // $userName = $order->name;
        // $productName = $order->product_name;
        // Chuyển hướng (redirect) sang view "bill" và truyền thông tin người dùng và tên sản phẩm
        // return redirect()->route('orders.bill', ['orderId' => $orderId, 'userName' => $userName, 'productName' => $productName])->with('success', 'Đặt hàng thành công!');
        // return redirect()->route('orders.bill', compact('userName', 'productName', 'orderId'))->with('success', 'Đặt hàng thành công!');
    }
    // public function showBill($orderId)
    // {
    //     $order = Order::findOrFail($orderId);

    //     return view('bill', compact('order'));     
    // }
    public function showBill()
    {
        // $orderId = $order->id;
        // $order = Order::join('users', 'orders.user_id', '=', 'users.id')
        // ->join('products', 'orders.product_id', '=', 'products.id')
        // ->select('orders.*', 'users.name', 'products.name as product_name')
        // ->findOrFail($orderId);
        // $userName = $order->name;
        // $productName = $order->product_name;
        // Chuyển hướng (redirect) sang view "bill" và truyền thông tin người dùng và tên sản phẩm
        // return redirect()->route('orders.bill', ['orderId' => $orderId, 'userName' => $userName, 'productName' => $productName])->with('success', 'Đặt hàng thành công!');
        return view('bill')->with('success', 'Đặt hàng thành công!');   
    }
}
