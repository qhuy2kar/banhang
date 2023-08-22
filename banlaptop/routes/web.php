<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('role:khachhang')->group(function () {
    // Đăng ký
    Route::get('/', function () {
        return redirect('home');
    });
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    //Đăng nhập
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    // Home
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    //Order
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.product')->middleware('auth.check');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    // Route::get('orders/{orderId}/bill', [OrderController::class,'showBill'])->name('orders.bill');
    Route::get('/bill', [OrderController::class,'showBill'])->name('orders.bill');
    Route::get('/orderDetails', [HomeController::class,'orderDetails'])->name('orders.details');

});
Route::middleware('role:quantri')->group(function () {
    // admin
    Route::prefix('admin')->group(function () {
        Route::get('/home', [AdminHomeController::class, 'showHomeForm'])->name('admin.home');
        Route::get('/logout', [AdminHomeController::class, 'logout'])->name('admin.logout');

        // Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
        Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
        Route::get('/orders', [OrdersController::class, 'showOrdersForm'])->name('admin.orders');
        Route::get('/users', [UsersController::class, 'showUsersForm'])->name('admin.users');

        Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductsController::class, 'store'])->name('products.store');

        // Route::get('/products/{id}', [ProductsController::class, 'show']);
        Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('product.edit');
        Route::post('/product/{id}', [ProductsController::class, 'update'])->name('product.update');
        Route::delete('/product/{id}/delete', [ProductsController::class, 'destroy'])->name('product.destroy');
    });
    // Route::get('/products', [ProductsController::class, 'showProductsForm'])->name('products');
});

