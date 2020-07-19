<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:student');
        $this->middleware('verified.otp');
    }

    public function showForm()
    {
        $txnId = Str::random(20);
        $key = config('payu.key');
        $salt = config('payu.salt');
        $user = auth('student')->user();
        $firstName = explode(' ', $user->name)[0];
        $amount = 1200;
        $hash = "$key|$txnId|$amount|membership|$firstName|{$user->email}|||||||||||$salt";
        $hash = strtolower(hash('sha512', $hash));
        return view('students.member.show', [
            'txnId' => $txnId,
            'key' => $key,
            'salt' => $salt,
            'hash' => $hash,
            'amount' => $amount,
            'firstName' => $firstName,
            'user' => $user,
        ]);
    }

    public function success(Request $request)
    {
        dd($request);
    }

    public function failure(Request $request)
    {
        dd($request);
    }
}
