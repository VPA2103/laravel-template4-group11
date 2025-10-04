<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\DB;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Kết nối thành công tới MySQL!";
    } catch (\Exception $e) {
        return "❌ Lỗi kết nối: " . $e->getMessage();
    }
});


Route::get('/register', function () {
    return view('auth.register'); // Blade view đăng ký
})->middleware('guest')->name('register.form');

Route::post('/register', [RegisterUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');
// Route::get('/dashboard', function() {
//     return view('dashboard');
// })->middleware('role:admin');

// Trang cho user
Route::get('/account', function() {
    return view('user.accountUser');
})->middleware('auth', 'loainhanvien:user')->name('accountUser');

//user
Route::get('/accountUser', [UserController::class, 'accountUser'])->name('accountUser');


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/shop',[ShopController::class,'index'])->name('shop');
Route::get('/single-product',[SingleProductController::class,'index'])->name('single-product');
Route::get('/cart',[CartController::class,'show'])->name('cart');
Route::get('/checkout',[CheckoutController::class,'show'])->name('checkout');
Route::get('/contact', [ContactController::class, 'create'])->name('contact'); // hiển thị form + danh sách
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


