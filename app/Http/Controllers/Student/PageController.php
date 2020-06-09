<?php

namespace App\Http\Controllers\Student;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Result;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
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
        $exams = Exam::all();
        return view('students.dashboard.exams', ['exams' => $exams]);
    }

    public function results()
    {
        $results = Result::with('exam')->get();
        return view('students.dashboard.results', ['results' => $results]);
    }

    public function solution($id)
    {
        $result = Result::findOrFail($id);
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
