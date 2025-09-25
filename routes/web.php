<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/homepage', [AuthController::class, 'homePage'])->name('homePage');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/enter',[AuthController::class, 'enter'])->name('enter');