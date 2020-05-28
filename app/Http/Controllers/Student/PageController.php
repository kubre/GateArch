<?php

namespace App\Http\Controllers\Student;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Result;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('students.dashboard.home');
    }

    public function profile()
    {
        return view('students.dashboard.profile');
    }

    public function exams()
    {
        $exams = Exam::all();
        return view('students.dashboard.exams', ['exams' => $exams]);
    }

    public function results()
    {
        $results = Result::all();
        return view('students.dashboard.results', ['results' => $results]);
    }
}
