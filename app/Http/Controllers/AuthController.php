<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function dashboard() {

        return view('dashboard');

    }

    public function register()
    {
        return view('register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:20',
        ]);

        User::create([
            'nome' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('login')->with('status', 'Usuário cadastrado com sucesso! Faça login.');
    }


    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');


        $user = User::where('email', $email)->whereNull('deleted_at')->first();

        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('login_error', 'Email ou password incorretos.');
        }

        if (!password_verify($password, $user->password)) {
            return redirect()->back()
                ->withInput()
                ->with('login_error', 'password incorreta.');
        }

        $user->last_login = now();
        $user->save();

        session([
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
            ]
        ]);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
