<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'senha' => 'required'
        ]);

        $usuario = Usuario::where('nome', $request->nome)->first();

        if (!$usuario) {
            return back()->withInput()->with('message', 'Não foi encontrado nenhum usuário com esse nome!');
        }

        if (!Hash::check($request->senha, $usuario->senha)) {
            return back()->withInput()->with('message', 'Senha incorreta, por favor tente novamente!');
        }

        Auth::login($usuario);
        return redirect()->route('dashboard');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('register.create');
    }
}
