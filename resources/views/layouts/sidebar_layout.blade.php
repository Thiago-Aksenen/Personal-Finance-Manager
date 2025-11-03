@extends('layouts.main_layout')

@section('header')
    <div class="container-fluid bg-secondary p-3"></div>
    <div class="container-fluid bg-info p-3 float-end"></div>
@endsection


@section('sidebar')

    <style>
        .nav-link {
            padding: 10px 12px;
            border-radius: 8px;
            transition: 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .nav-link.active-link {
            background-color: #70e059ff;
            color: white !important;
            font-weight: bold;
        }
    </style>

    <nav class="bg-dark text-white p-5 d-flex flex-column" style="min-width: 200px; max-width:250px; height: 100vh;">
        <h4>Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link text-white {{ Route::is('dashboard') ? 'active-link' : '' }}">
                    <i class="fas fa-house me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('receitas.index') }}"
                    class="nav-link text-white {{ Route::is('receitas') ? 'active-link' : '' }}">
                    <i class="fas fa-wallet me-2"></i> Receitas
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('despesas.index') }}"
                    class="nav-link text-white {{ Route::is('despesas') ? 'active-link' : '' }}">
                    <i class="fas fa-money-bill-wave me-2"></i> Despesas
                </a>
            </li>
        </ul>

        <div class="mt-auto">
            <a href="{{ route('perfil') }}" class="nav-link text-white {{ Route::is('perfil') ? 'active-link' : '' }}">
                <i class="fas fa-user me-2"></i> Perfil
            </a>
        </div>
    </nav>

@endsection