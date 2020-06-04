<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterForm()
    {
        return view('students.auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $student = $this->create($request->all());

        $student->sendEmailVerificationNotification();

        auth('student')->login($student);

        return redirect()->route('students.dashboard');
    }

    public function validator($data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:191',
            'mobile' => 'required|digits:10',
            'email' => 'required|email|max:50|unique:students',
            'dob' => 'required|date|before:today',
            'college_name' => 'required|string|max:191',
            'graduation_status' => 'required|in:appearing,passed',
            'graduation_year' => 'required_if:graduation_status,passed',
            'password' => 'required|confirmed|min:6|max:30',
            'terms' => 'required',
        ]);
    }

    public function create($data)
    {
        return Student::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'college_name' => $data['college_name'],
            'graduation_status' => $data['graduation_status'],
            'graduation_year' => $data['graduation_year'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
