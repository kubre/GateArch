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
    });

Route::view('/exam/instructions', 'students.exam.instructions');
Route::view('/calc', 'students.exam.calculator');
Route::get('/exam/main', 'ExamHandlerController@index');
