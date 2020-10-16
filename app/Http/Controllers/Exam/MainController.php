<?php

namespace App\Http\Controllers\Exam;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Result;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MainController extends Controller
{
    private $student = null;

    public function __construct()
    {
        $this->middleware('verified.otp');
        $this->middleware('auth:student');
    }

    public function showInstructions(Exam $exam)
    {
        abort_unless(
            $exam->isValid() 
            && ($exam->test_series->price == 0 
                || $this->student()->canTake($exam)),
            Response::HTTP_FORBIDDEN
        );
        return view('students.exam.instructions', ['exam' => $exam]);
    }

    public function startExam(Exam $exam)
    {
        abort_unless(
            $exam->isValid() 
            && ($exam->test_series->price == 0 
                || $this->student()->canTake($exam)),
            Response::HTTP_FORBIDDEN
        );
        return view('students.exam.main', ['exam' => $exam]);
    }

    public function endExam(Request $request)
    {
        return view('students.exam.result', $request->input());
    }

    public function student(): Student
    {
        return $this->student ?? ($this->student = auth('student')->user());
    }
}
