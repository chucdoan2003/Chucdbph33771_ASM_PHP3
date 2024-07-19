<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{id}',[HomeController::class, 'showdetailPr'])->name('product.show');
Route::get('/products',[HomeController::class, 'showAllPr'])->name('product.index');
Route::get('/products/category/{id}',[HomeController::class, 'prCate'])->name('product.cate');

Route::get('/carts', [CartController::class, 'listProduct'])->name('cart.list');
Route::post('/adcart', [CartController::class, 'addnewPr'])->name('cart.add');
Route::get('/cart/destroy/{id}', [CartController::class, 'destroyCart'])->name('cart.destroy');

//đơn hàng
Route::get('/orders',[OrderController::class,'index'])->name('order.index');




Route::get('thanhtoan',function(){
    return view('public.thanhtoan');
})->name('thanhtoan');

Route::get('/admin',function(){
    return view('admin.home');
});
//đăng ký đăng nhập
Route::get('/login',[AuthController::class, 'showlogin'])->name('auth.showlogin');
Route::post('/login',[AuthController::class, 'login'])->name('auth.login');
Route::get('/register',[AuthController::class, 'showregister'])->name('auth.showregister');
Route::post('/register',[AuthController::class, 'register'])->name('auth.register');

//thanh toán
Route::post('/thanhtoan',[CartController::class, 'thanhtoan'])->name('thanhtoan');