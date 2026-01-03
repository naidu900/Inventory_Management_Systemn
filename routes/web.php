<?php

use App\Jobs\ProcessDataJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminLoginController;


/*Route::get('/', function () {
    return view('welcome');
});*/

/* Admin Login */
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout');

/* Admin Dashboard */
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
});



//user login
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('register',[RegisterController::class,'showRegister'])->name('register');
Route::post('register',[RegisterController::class,'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.submit');

Route::post('/logout',[LoginController::class,'logout'])->name('logout');


/*Route::get('/dashboard', function () {
    return "Welcome to Dashboard";
})->middleware('auth')->name('dashboard');*/

// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware('auth')
//     ->name('dashboard');


Route::get('/cart', [CartController::class, 'index'])
    ->middleware('auth')
    ->name('cart');

Route::get('/add-to-cart/{id}', [CartController::class, 'add'])
    ->middleware('auth')
    ->name('add.cart');

Route::delete('/remove-card/{id}',[CartController::class,'destroy'])
    ->middleware('auth')    
    ->name('remove.cart');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.delete');

    //!quantity routes
    Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
   Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');

   Route::get('/profile/edit', fn () => view('profile.edit'))->name('profile.edit');
Route::get('/change-password', fn () => view('auth.change-password'))->name('password.change');
Route::get('/orders', fn () => view('orders.track'))->name('orders.track');


});

// Route::get('/dashboard', function () {
//     return "Welcome to Dashboard";
// })->middleware('auth')->name('dashboard');
