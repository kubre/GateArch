<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

class ExamHandlerController extends Controller
{
    public function index()
    {
        return view('students.exam.main');
    }
}
