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
    ->name('students.')
    ->group(function () {
        Route::get('login', 'AuthController@showLoginForm');
        Route::post('login', 'AuthController@login')
            ->name('login');
        Route::get('logout', 'AuthController@logout')
            ->name('logout');
        Route::get('register', 'AuthController@showRegisterForm');
        Route::get('register', 'AuthController@register')
            ->name('register');

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
