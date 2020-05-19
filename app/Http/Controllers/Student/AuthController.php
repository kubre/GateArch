<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('students.auth.login');
    }

    public function showRegisterForm()
    {
        return view('students.auth.register');
    }

    public function login(Request $request)
    {
        return view('students.dashboard.home');
    }

    public function register(Request $request)
    {
    }
}
