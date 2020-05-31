<?php

use App\Result;
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


Route::get('/exam/{id}', function ($id) {
    $exam = App\Exam::findOrFail($id);
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

Route::post('/result', function (Request $request) {
    $r = new Result;
    $r->store($request->all());
    return [
        'totalQuestions' => $r->total_questions,
        'maxMarks' => $r->max_marks,
        'totalAttempted' => $r->total_attempted,
        'correctAnswers' => $r->correct_answers,
        'totalTime' => $r->total_time,
        'timeTaken' => $r->time_taken,
        'rightMarks' => $r->right_marks,
        'negativeMarks' => $r->negative_marks,
        'totalMarks' => $r->total_marks
    ];
});
