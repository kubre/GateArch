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
