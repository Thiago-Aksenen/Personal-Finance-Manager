<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/homepage', [AuthController::class, 'homePage'])->name('homePage');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/enter',[AuthController::class, 'enter'])->name('enter');


//visualisação do layout de navegação
Route::get('/teste-layout', function () {
    return view('layouts.navegacao_layout');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Receitas
Route::get('/receitas', function () {
    return view('receitas');
})->name('receitas');

// Despesas
Route::get('/despesas', function () {
    return view('despesas');
})->name('despesas');

//Perfil
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');
