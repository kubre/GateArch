<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OTPVerificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function showForm()
    {
        return auth('student')->user()->hasVerifiedMobile()
            ? redirect()->route('students.dashboard')
            : view('students.auth.otp');
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'otp' => 'required|numeric'
        ]);
        $user = auth('student')->user();
        if (!$user->isValidOTP($data['otp']))
            throw ValidationException::withMessages([
                'otp' => 'Failed to match the OTP'
            ]);

        $user->markMobileAsVerified();
        return redirect()->route('students.dashboard');
    }

    public function resendOTP()
    {
        $user = auth('student')->user();
        if ($user->hasVerifiedMobile()) return back();

        $user->sendMobileVerificationNotification();
        return redirect()->route('students.otp.verify.show');
    }
}
