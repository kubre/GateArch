<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/exam', function () {
    $exam = App\Exam::first();
    $sectionSorted = $exam->sections->map(function ($section) {
        return collect($section->questions)->sortBy('number', SORT_NUMERIC)->values()->all();
    });
    $s = $exam->sections;
    $sectionSorted->each(function ($questions, $i) use ($s) {
        $s[$i]->questions = $questions;
    });
    return [
        'exam' => $exam,
        'sections' => $s
    ];
});

Route::post('/result', function (Request $r) {
    $sections = json_decode($r->sections);
    $totalQuestions = 0;
    $totalAttempted = 0;
    $correct = 0;
    $rightMarks = 0;
    $negativeMarks = 0;

    foreach ($sections as $section) {
        foreach ($section->questions as $question) {
            $totalQuestions++;
            if (!empty($question->userAnswer)) {
                $totalAttempted++;
                if ($question->answer == $question->userAnswer) {
                    $rightMarks += (float) $question->marks;
                    $correct++;
                } else {
                    if ($question->negative != '0') {
                        $negativeMarks += (float) ($question->negative == '1/3' ? 1 / 3 : 2 / 3);
                    }
                }
            }
        }
    }

    list($m, $s) = explode(':', $r->time);
    return [
        'totalQuestions' => $totalQuestions,
        'totalAttempted' => $totalAttempted,
        'correctAnswers' => $correct,
        'rightMarks' => $rightMarks,
        'negativeMarks' => round($negativeMarks, 2),
        'totalMarks' => $rightMarks - round($negativeMarks, 2),
        'totalTime' => $r->totalTime,
        'timeTaken' => ($r->totalTime - $m - ($s == '0' ? 0 : 1)) . ':' . (($s == '0' ? '00' : 60 - $s))
    ];
});
