<?php

use App\Http\Controllers\DespesaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReceitaController;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('register.create');
});

// se o usuario está logado, não pode acessar:
Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/cadastro', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/cadastro', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'login'])->name('login.login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// o usuario SÓ PODE se estiver LOGADO, presta atencao em
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [Logincontroller::class, 'logout'])->name('login.logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    // CRUD RECEITAS
    Route::get('/receita', [ReceitaController::class, 'index'])->name('receita.index');
    Route::get('/receita/create', [ReceitaController::class, 'create'])->name('receita.create');
    Route::post('/receita/store', [ReceitaController::class, 'store'])->name('receita.store');
    Route::get('/receita/{receita}/edit', [ReceitaController::class, 'edit'])->name('receita.edit');
    Route::put('/receita/{receita}', [ReceitaController::class, 'update'])->name('receita.update');
    Route::delete('/receita/{receita}', [ReceitaController::class, 'destroy'])->name('receita.destroy');

    // CRUD DESPESAS
    Route::get('/despesa', [DespesaController::class, 'index'])->name('despesa.index');
    Route::get('/despesa/create', [DespesaController::class, 'create'])->name('despesa.create');
    Route::post('/despesa/store', [DespesaController::class, 'store'])->name('despesa.store');
    Route::get('/despesa/{despesa}/edit', [DespesaController::class, 'edit'])->name('despesa.edit');
    Route::put('/despesa/{despesa}', [DespesaController::class, 'update'])->name('despesa.update');
    Route::delete('/despesa/{despesa}', [DespesaController::class, 'destroy'])->name('despesa.destroy');
});
