<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\UsersController;
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

// Đăng ký
Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', [RegisterController::class, 'showRegistrationForm'])->name('home');
Route::post('/home', [RegisterController::class, 'register']);
//Đăng nhập
Route::get('/home', [LoginController::class, 'showLoginForm'])->name('home');
Route::post('/home', [LoginController::class, 'login']);
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

// admin
Route::prefix('admin')->group(function () {
    Route::get('/home', [AdminHomeController::class, 'showHomeForm'])->name('admin.home');
    // Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::get('/orders', [OrdersController::class, 'showOrdersForm'])->name('admin.orders');
    Route::get('/users', [UsersController::class, 'showUsersForm'])->name('admin.users');

    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
});
// Route::get('/products', [ProductsController::class, 'showProductsForm'])->name('products');