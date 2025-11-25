<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.cadastro');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nome'  => 'required|max:20',
                'email' => 'required|email',
                'senha' => 'required|max:20'
            ],
            [
                'nome.required' => 'O campo de nome é obrigatório',
                'nome.max' => 'O campo de nome não pode ter mais do que 20 caracteres!',
                'email.required' => 'O campo de email é obrigatório',
                'email.email' => 'O campo deve ser preenchido com um email válido!',
                'senha.required' => 'O campo de senha é obrigatório',
                'senha.max' => 'O campo de senha não pode ter mais do que 20 caracteres!',
            ]
        );
        if (Usuario::where('email', $request->email)->exists()) {
            return back()->withInput()->with('message', 'Já existe um usuário com esse email!');
        }

        $usuario = Usuario::create([
            'nome'  => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        Auth::login($usuario);

        return redirect()->route('dashboard');
    }
}
