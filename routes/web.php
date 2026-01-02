<?php

use App\Http\Controllers\HomeController;
use App\Jobs\ProcessDataJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Auth\AuthController;


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('register',[RegisterController::class,'showRegister'])->name('register');
Route::post('register',[RegisterController::class,'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.submit');

Route::post('/logout',[LoginController::class,'logout'])->name('logout');


/*Route::get('/dashboard', function () {
    return "Welcome to Dashboard";
})->middleware('auth')->name('dashboard');*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


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
});

// Route::get('/dashboard', function () {
//     return "Welcome to Dashboard";
// })->middleware('auth')->name('dashboard');
