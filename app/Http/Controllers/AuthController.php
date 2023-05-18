<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('auth.login');
    }
    
    public function viewRegister()
    {
        return view('auth.register');
    }
}