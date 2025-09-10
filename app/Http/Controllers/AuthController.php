<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function homePage()
    {
        return view('homePage');
    }
    public function login()
    {
        echo 'login';
    }
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:20',
            'email' => 'required|email',
            'password' => 'required|min:3|max:20',
        ]);

        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        echo 'Usuário: ' . $username . '<br>';
        echo 'Email: ' . $email . '<br>';
        echo 'Senha: ' . $password;
    }
}
