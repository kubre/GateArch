<?php

namespace App\Http\Controllers\Student;

use App\Exam;
use App\Result;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
        $this->middleware('verified.otp');
    }

    public function dashboard()
    {
        $exams_count = Exam::count();
        $results_count = Result::count();
        return view('students.dashboard.home', [
            'exams_count' => $exams_count,
            'results_count' => $results_count
        ]);
    }

    public function profile()
    {
        $user = auth('student')->user();
        return view('students.dashboard.profile', ['user' => $user]);
    }

    public function exams()
    {
        $exams = Exam::orderBy('created_at', 'desc')->paginate(10);
        return view('students.dashboard.exams', ['exams' => $exams]);
    }

    public function results()
    {
        $results = auth('student')->user()->results()->with('exam')->orderBy('created_at', 'desc')->paginate(10);
        return view('students.dashboard.results', ['results' => $results]);
    }

    public function solution(Result $result)
    {
        $sections = $result->exam->sectionsSorted();
        return view('students.dashboard.solution', ['result' => $result, 'sections' => $sections]);
    }

    public function logout(Request $request)
    {
        auth('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('students.login.show');
    }
}
