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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/result', function (Request $request) {
    $r = new Result;
    $r->store($request->all(), $request->userId);
    return [
        'totalQuestions' => $r->total_questions,
        'maxMarks' => $r->max_marks,
        'totalAttempted' => $r->total_attempted,
        'correctAnswers' => $r->correct_answers,
        'totalTime' => $r->total_time,
        'timeTaken' => $r->time_taken,
        'rightMarks' => $r->right_marks,
        'negativeMarks' => $r->negative_marks,
        'rank' => $r->getRank(),
    ];
});
