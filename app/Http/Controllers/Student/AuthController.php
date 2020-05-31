<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:student');
    }

    public function showLoginForm()
    {
        return view('students.auth.login', [
            'loginRoute' => route('students.login'),
            'forgotPasswordRoute' => '/',
        ]);
    }

    public function showRegisterForm()
    {
        return view('students.auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth('student')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->intended(route('students.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function register(Request $request)
    {
        return true;
    }

    public function logout(Request $request)
    {
        auth('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('students.login');
    }
}
