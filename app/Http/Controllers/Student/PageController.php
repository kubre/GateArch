<?php

namespace App\Http\Controllers\Student;

use App\Exam;
use App\Result;

use App\Http\Controllers\Controller;
use App\Student;
use App\TestSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
            'results_count' => $results_count,
            'user' => auth('student')->user(),
        ]);
    }

    public function profile()
    {
        $user = auth('student')->user();
        return view('students.dashboard.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        /** @var Student */
        $user = auth('student')->user();
        $data = $request->validate([
            'mobile' => ['required', 'digits:10', Rule::unique('students')->ignore($user->id)],
            'college_name' => 'required|string|max:191',
            'graduation_status' => 'required|in:appearing,passed',
            'graduation_year' => 'required_if:graduation_status,passed|digits:4',
            'password' => 'nullable|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|min:8|max:30',
        ]);

        if ($request->has('password'))
            $data['password'] = Hash::make($data['password']);

        $isMobileChanged = $user->mobile != $data['mobile'];

        if ($isMobileChanged) $user->mobile_verified_at = null;

        $user->update($data);

        if ($isMobileChanged) $user->sendMobileVerificationNotification();

        return back()->with('status', 'Profile updated!');
    }

    public function exams()
    {
        $exams = (new Exam)->getValidExams()->orderBy('created_at', 'desc')->paginate(6);
        return view('students.dashboard.exams', ['exams' => $exams]);
    }

    public function testSeries()
    {
        return view('students.dashboard.testseries', [
            'serieses' => TestSeries::with('exams')
                ->whereNotIn(
                    'id',
                    auth('student')->user()->test_series()->get(['test_series.id'])->pluck('id')->toArray()
                )
                ->orderBy('price')
                ->orderBy('created_at', 'DESC')
                ->paginate(10),
        ]);
    }

    public function results()
    {
        $results = auth('student')->user()->results()->with('exam')->orderBy('created_at', 'desc')->paginate(6);
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
