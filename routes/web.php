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

Route::get('email/verify', 'Student\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Student\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Student\VerificationController@resend')->name('verification.resend');

Route::prefix('students')
    ->namespace('Student')
    ->name('students.')
    ->group(function () {
        Route::get('login', 'LoginController@showLoginForm')
            ->name('login.show');
        Route::post('login', 'LoginController@login')
            ->name('login');
        Route::get('register', 'RegisterController@showRegisterForm')
            ->name('register.show');
        Route::post('register', 'RegisterController@register')
            ->name('register');

        Route::post('logout', 'PageController@logout')
            ->name('logout');

        Route::get('dashboard', 'PageController@dashboard')->name('dashboard');
        Route::get('profile', 'PageController@profile')->name('profile');
        Route::get('exams', 'PageController@exams')->name('exams');
        Route::get('results', 'PageController@results')->name('results');
    });

Route::prefix('exams')
    ->namespace('Exam')
    ->group(function () {
        Route::get('instructions/{id}', 'MainController@showInstructions')->name('exam.instructions');
        Route::get('start/{id}', 'MainController@startExam')->name('exam.start');
        Route::get('end', 'MainController@endExam')->name('exam.end');
        Route::view('results', 'students.exam.result')->name('render.results');
    });
