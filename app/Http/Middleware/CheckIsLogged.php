<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsLogged
{
    // Ó e presta atenção, esse middleware serve para que CASO ESTEJA LOGADO - NAO PODE ACESSAR
    // a gente vai usar essa bomba para caso o usuario(bobao) tente acessar cadastro/login já estando logado!!
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
