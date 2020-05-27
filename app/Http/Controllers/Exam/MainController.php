<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showInstructions()
    {
        return view('students.exam.instructions');
    }

    public function startExam()
    {
        return view('students.exam.main');
    }

    public function endExam(Request $request)
    {
        return view('students.exam.result', $request->input());
    }
}
