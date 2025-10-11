<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\DB;



Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Kết nối thành công tới MySQL!";
    } catch (\Exception $e) {
        return "❌ Lỗi kết nối: " . $e->getMessage();
    }
});






//user
Route::middleware(['auth'])->group(function () {
    // Giao diện tài khoản người dùng
    Route::get('/account-dashboard', [UserController::class,'index'])->name('user.index');
    });


//admin
Route::middleware(['auth',AuthAdmin::class])->group(function () {
    // Giao diện tài khoản người dùng
    Route::get('/admin', [AdminController::class,'index'])->name('admin.index');
    });





Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/shop',[ShopController::class,'index'])->name('shop');
Route::get('/single-product',[SingleProductController::class,'index'])->name('single-product');
Route::get('/cart',[CartController::class,'show'])->name('cart');
Route::get('/checkout',[CheckoutController::class,'show'])->name('checkout');
Route::get('/contact', [ContactController::class, 'create'])->name('contact'); // hiển thị form + danh sách
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/product/{MaSanPham}', [HomeController::class, 'show'])->name('product.show');
// Route::get('/product/top-seller', [HomeController::class, 'topSellers'])->name('product.top.seller');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
