<?php

namespace App\Http\Controllers\Exam;

use App\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showInstructions($id)
    {
        $exam = Exam::findOrFail($id);
        return view('students.exam.instructions', ['exam' => $exam]);
    }

    public function startExam($id)
    {
        return view('students.exam.main', ['id' => $id]);
    }

    public function endExam(Request $request)
    {
        return view('students.exam.result', $request->input());
    }
}
