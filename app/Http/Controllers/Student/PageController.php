<?php

namespace App\Http\Controllers\Student;

use App\Exam;
use App\Result;

use App\Http\Controllers\Controller;
use App\Student;
use App\TestSeries;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    /** @var Student */
    protected $student = null;

    public function __construct()
    {
        $this->middleware('auth:student');
        $this->middleware('verified.otp');
    }

    public function dashboard()
    {
        $exams_count = $this->student()->with('test_series.exams')->first()->test_series->count();
        $results_count = Result::count();
        return view('students.dashboard.home', [
            'exams_count' => $exams_count,
            'results_count' => $results_count,
            'user' => $this->student(),
        ]);
    }

    public function profile()
    {
        return view(
            'students.dashboard.profile',
            ['user' => $this->student()]
        );
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'mobile' => [
                'required', 'digits:10',
                Rule::unique('students')->ignore($this->student()->id)
            ],
            'college_name' => 'required|string|max:191',
            'graduation_status' => 'required|in:appearing,passed',
            'graduation_year' => 'required_if:graduation_status,passed|digits:4',
            'password' => 'nullable|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|min:8|max:30',
        ]);

        if ($request->has('password'))
            $data['password'] = Hash::make($data['password']);

        $isMobileChanged = $this->student()->mobile != $data['mobile'];

        if ($isMobileChanged) $this->student()->mobile_verified_at = null;

        $this->student()->update($data);

        if ($isMobileChanged) $this->student()->sendMobileVerificationNotification();

        return back()->with('status', 'Profile updated!');
    }

    public function exams()
    {
        $tests = $this->student()
            ->test_series()
            ->get();
        $tests = $tests->merge(TestSeries::where('price', 0)->get());
        return view(
            'students.dashboard.listseries',
            ['tests' => $tests]
        );
    }

    public function myExams(TestSeries $series)
    {
        return view(
            'students.dashboard.exams',
            ['exams' => $series->exams]
        );
    }

    public function testSeries()
    {
        return view('students.dashboard.testseries', [
            'serieses' => TestSeries::with('exams')
                ->whereNotIn(
                    'id',
                    $this->student()->test_series()->get(['test_series.id'])->pluck('id')->toArray()
                )
                ->where('price', '!=', 0)
                ->orderBy('price')
                ->orderBy('created_at', 'DESC')
                ->paginate(10),
        ]);
    }

    public function results()
    {
        $results = $this->student()->results()->with('exam')->orderBy('created_at', 'desc')->paginate(6);
        return view('students.dashboard.results', ['results' => $results]);
    }

    public function history()
    {
        return view('students.dashboard.history', [
            'transactions' => $this->student()->transactions()->paginate(10),
        ]);
    }

    public function transaction(Transaction $transaction)
    {
        return view('students.dashboard.transaction', [
            'transaction' => $transaction,
        ]);
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

    public function student(): Student
    {
        return $this->student ?? ($this->student = auth('student')->user());
    }
}
