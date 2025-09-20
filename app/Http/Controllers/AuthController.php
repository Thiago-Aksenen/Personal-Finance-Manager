<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function homePage()
    {
        return view('homePage');
    }
    public function login()
    {
        echo 'login novo';
    }
    public function register(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|min:3|max:20',
                'email' => 'required|email',
                'password' => 'required|min:3|max:20',
            ],
            [
                'username.required' => 'O campo de nome é obrigatório!',
                'username.min' => 'O campo de nome deve ter no mínimo 3 caracteres!',
                'username.max' => 'O campo de nome deve ter no máximo 20 caracteres!',

                'email.required' => 'O campo de email é obrigatório!',
                'email.email' => 'O valor digitado deve ser um email!',

                'password.required' => 'O campo de senha é obrigatório!',
                'password.min' => 'O campo de senha deve ter no mínimo 3 caracteres!',
                'password.max' => 'O campo de senha deve ter no máximo 20 caracteres!',
            ],
        );

        try {
            DB::connection()->getPdo();
            echo 'Connection is OK <br>';
        } catch (\PDOException $e) {
            echo 'A conexão falhou: ' . $e->getMessage();
        }

        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        echo 'Usuário: ' . $username . '<br>';
        echo 'Email: ' . $email . '<br>';
        echo 'Senha: ' . $password;
    }
}
