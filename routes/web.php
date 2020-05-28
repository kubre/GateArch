<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

Route::prefix('students')
    ->namespace('Student')
    ->group(function () {
        Route::get('login', 'AuthController@showLoginForm');
        Route::post('login', 'AuthController@login')
            ->name('students.login');
        Route::get('register', 'AuthController@showRegisterForm');
        Route::get('register', 'AuthController@register')
            ->name('students.register');

        Route::get('dashboard', 'PageController@dashboard')->name('students.dashboard');
        Route::get('profile', 'PageController@profile')->name('students.profile');
        Route::get('exams', 'PageController@exams')->name('students.exams');
        Route::get('results', 'PageController@results')->name('students.results');
    });

Route::prefix('exams')
    ->namespace('Exam')
    ->group(function () {
        Route::get('instructions', 'MainController@showInstructions')->name('exam.instructions');
        Route::get('start', 'MainController@startExam')->name('exam.start');
        Route::get('end', 'MainController@endExam')->name('exam.end');
        Route::view('results', 'students.exam.result');
    });
