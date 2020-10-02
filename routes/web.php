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

Route::view('/', 'index');
Route::view('/gatearch', 'gatearch');
Route::view('/about-us', 'about');

Route::get('/contact-us', 'SiteController@contactUs');
Route::post('/contact-us', 'SiteController@contactUsForm');

Route::view('/terms-and-conditions', 'terms');
Route::view('/privacy-policy', 'privacy');

Route::get('/online-test-series', 'SiteController@testSeries');

Route::view('/faqs', 'site.coming');
Route::view('/shop', 'site.coming');

Route::get('/blog', 'SiteController@blog');
Route::get('/blog/{post}/{title}', 'SiteController@posts')->name('posts');

Route::prefix('tests')->group(function () {
    Route::view('aai', 'site.aai');
    Route::view('isro', 'site.isro');
    Route::view('upsc', 'site.upsc');
    Route::view('dda', 'site.dda');
    Route::view('mah', 'site.mah');
    Route::view('kcet', 'site.kcet');
});


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
        Route::get('test-series', 'PageController@testSeries')->name('testseries');
        Route::get('exams', 'PageController@exams')->name('exams');
        Route::get('myexams/{series}', 'PageController@myExams')->name('myexams');
        Route::get('results', 'PageController@results')->name('results');
        Route::get('history', 'PageController@history')->name('purchase.history');
        Route::get('/history/{transaction}', 'PageController@transaction')->name('transaction');
        Route::get('solution/{result}', 'PageController@solution')->name('solution');

        Route::get('purchase/{id}', 'PurchaseController@show')->name('purchase.show')->middleware('auth:student');
        Route::post('purchase/success', 'PurchaseController@success')->name('purchase.success');
        Route::post('purchase/failure', 'PurchaseController@failure')->name('purchase.failure');

        // Route::get('membership', 'MemberController@showForm')->name('membership.show');
        // Route::post('membership/success', 'MemberController@success')->name('membership.success');
        // Route::post('membership/failure', 'MemberController@failure')->name('membership.failure');
    });

Route::prefix('exams')
    ->namespace('Exam')
    ->group(function () {
        Route::get('instructions/{exam}', 'MainController@showInstructions')->name('exam.instructions');
        Route::get('start/{exam}', 'MainController@startExam')->name('exam.start');
        Route::get('end', 'MainController@endExam')->name('exam.end');
        Route::view('results', 'students.exam.result')->name('render.results');
    });
