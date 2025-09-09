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
}
