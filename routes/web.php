<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register',[RegisterController::class,'showRegister'])->name('register');
Route::Post('register',[RegisterController::class,'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.submit');

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/dashboard',function(){
    return view('welcome to dashboard');
});