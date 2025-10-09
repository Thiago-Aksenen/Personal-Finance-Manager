<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\DespesaController;
use App\Models\Receita;

Route::get('/homepage', [AuthController::class, 'homePage'])->name('homePage');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Receitas
Route::get('/receitas', [ReceitaController::class, 'index'])->name('receitas.index');
Route::get('/receitas/create', [ReceitaController::class, 'create'])->name('receitas.create');
Route::post('/receitas', [ReceitaController::class, 'store'])->name('receitas.store');
Route::get('/receitas/{id}/edit', [ReceitaController::class, 'edit'])->name('receitas.edit');
Route::put('/receitas/{id}', [ReceitaController::class, 'update'])->name('receitas.update');
Route::delete('/receitas/{id}', [ReceitaController::class, 'destroy'])->name('receitas.destroy');

// Despesas
Route::get('/despesas', [DespesaController::class, 'index'])->name('despesas.index');
Route::get('/despesas/create', [DespesaController::class, 'create'])->name('despesas.create');
Route::post('/despesas', [DespesaController::class, 'store'])->name('despesas.store');
Route::get('/despesas/{id}/edit', [DespesaController::class, 'edit'])->name('despesas.edit');
Route::put('/despesas/{id}', [DespesaController::class, 'update'])->name('despesas.update');
Route::delete('/despesas/{id}', [DespesaController::class, 'destroy'])->name('despesas.destroy');
