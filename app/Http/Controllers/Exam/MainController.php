<?php

namespace App\Http\Controllers\Exam;

use App\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified.otp');
        $this->middleware('auth:student');
    }

    public function showInstructions(Exam $exam)
    {
        return view('students.exam.instructions', ['exam' => $exam]);
    }

    public function startExam(Exam $exam)
    {
        return view('students.exam.main', ['exam' => $exam]);
    }

    public function endExam(Request $request)
    {
        return view('students.exam.result', $request->input());
    }
}
