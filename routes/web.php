<?php
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/shop',[ShopController::class,'index'])->name('shop');
Route::get('/single-product',[SingleProductController::class,'index'])->name('single-product');
Route::get('/cart',[CartController::class,'show'])->name('cart');
Route::get('/checkout',[CheckoutController::class,'show'])->name('checkout');


