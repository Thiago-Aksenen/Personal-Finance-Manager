<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/homepage', [AuthController::class, 'homePage'])->name('homePage');
Route::get('/login', [AuthController::class, 'login'])->name('login');