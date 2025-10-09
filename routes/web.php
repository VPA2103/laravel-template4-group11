<?php
use App\Http\Controllers\AdminController;
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


// Route::get('/account', function() {
//     return view('user.accountUser');
// })->middleware('auth', 'loainhanvien:user')->name('accountUser');

// Route::get('/accountAdmin', function() {
//     return view('user.accountAdmin');
// })->middleware('auth', 'loainhanvien:admin')->name('accountAdmin');

//user
Route::middleware(['auth', 'loainhanvien:user'])->group(function () {
    // Giao diện tài khoản người dùng
    Route::get('/account', function () {return view('user.accountUser');})->name('accountUser.view');
    });


//admin
Route::middleware(['auth', 'loainhanvien:admin'])->group(function () {
    // Giao diện tài khoản admin
    Route::get('/accountAdmin', function () {return view('user.accountAdmin');})->name('accountAdmin.view');
     });


//user
Route::get('/accountUser', [UserController::class, 'accountUser'])->name('accountUser');

//admin
Route::get('/accountAdmin', [AdminController::class, 'accountAdmin'])->name('accountAdmin');


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/shop',[ShopController::class,'index'])->name('shop');
Route::get('/single-product',[SingleProductController::class,'index'])->name('single-product');
Route::get('/cart',[CartController::class,'show'])->name('cart');
Route::get('/checkout',[CheckoutController::class,'show'])->name('checkout');
Route::get('/contact', [ContactController::class, 'create'])->name('contact'); // hiển thị form + danh sách
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/product/{MaSanPham}', [HomeController::class, 'show'])->name('product.show');
// Route::get('/product/top-seller', [HomeController::class, 'topSellers'])->name('product.top.seller');





