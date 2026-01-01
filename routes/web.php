<?php

use App\Http\Controllers\HomeController;
use App\Jobs\ProcessDataJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('register',[RegisterController::class,'showRegister'])->name('register');
// Route::post('register',[RegisterController::class,'register'])->name('register.submit');

// Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
// Route::post('/login',[LoginController::class,'login'])->name('login.submit');

// Route::post('/logout',[LoginController::class,'logout'])->name('logout');

// Route::get('/dashboard', function () {
//     return "Welcome to Dashboard";
// })->middleware('auth')->name('dashboard');
// Show pages
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

//^AuthController register,login and logout
Route::post('register', [AuthController::class,'register'])->name('register.post');
Route::post('login', [AuthController::class,'login'])->name('login.post');
Route::post('logout', [AuthController::class,'logout'])->name('logout.post');

//! i am home route
Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

    Route::get('job',function(){
        ProcessDataJob::dispatch("i am dispatch function");
        return "Send Data";
    });
//Route::get('home',[HomeController::class,'index']);
// ->name('home');