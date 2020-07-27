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

Route::view('/', 'index', ['exams' => App\Exam::orderBy('created_at', 'DESC')->take(3)->get()]);
Route::view('/gatearch', 'gatearch');
Route::view('/about-us', 'about');
Route::get('/contact-us', function () {
    return view('contact');
});
Route::post('/contact-us', 'Student\ActionController@contactUs');
Route::view('/terms-and-conditions', 'terms');
Route::view('/privacy-policy', 'privacy');

Route::get('email/verify', 'Student\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Student\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Student\VerificationController@resend')->name('verification.resend');

Route::get('password/reset', 'Student\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Student\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Student\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Student\ResetPasswordController@reset')->name('password.update');

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

        Route::get('verify/mobile', 'OTPVerificationController@showForm')->name('otp.verify.show');

        Route::get('verify/mobile/resend', 'OTPVerificationController@resendOTP')->name('otp.verify.resend');

        Route::post('verify/mobile', 'OTPVerificationController@verify')->name('otp.verify');


        Route::get('dashboard', 'PageController@dashboard')->name('dashboard');
        Route::get('profile', 'PageController@profile')->name('profile');
        Route::post('profile', 'PageController@updateProfile')->name('profile.update');
        Route::get('exams', 'PageController@exams')->name('exams');
        Route::get('results', 'PageController@results')->name('results');
        Route::get('solution/{result}', 'PageController@solution')->name('solution');


        Route::get('membership', 'MemberController@showForm')->name('membership.show');
        Route::post('membership/success', 'MemberController@success')->name('membership.success');
        Route::post('membership/failure', 'MemberController@failure')->name('membership.failure');
    });

Route::prefix('exams')
    ->namespace('Exam')
    ->group(function () {
        Route::get('instructions/{exam}', 'MainController@showInstructions')->name('exam.instructions');
        Route::get('start/{exam}', 'MainController@startExam')->name('exam.start');
        Route::get('end', 'MainController@endExam')->name('exam.end');
        Route::view('results', 'students.exam.result')->name('render.results');
    });
