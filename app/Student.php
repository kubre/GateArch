<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticable implements MustVerifyEmail, CanResetPassword
{
    use Notifiable, MustVerifyEmailTrait, MustVerifyMobile, CanResetPasswordTrait;

    protected $guard = 'student';

    protected $fillable = [
        'name', 'photo', 'mobile', 'email', 'dob', 'college_name', 'graduation_status', 'graduation_year', 'password', 'email_verified_at', 'member_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }


    public function isMember()
    {
        return !is_null($this->member_at) &&
            $this->member_at->addDays(365)->isAfter(Carbon::now());
    }


    public function renewMembership()
    {
        $this->forceFill([
            'member_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('created_at', 'DESC');
    }

    public function test_series()
    {
        return $this->belongsToMany(TestSeries::class);
    }

    public function canTake(Exam $exam)
    {
        return $this->test_series()->where('test_series.id', optional($exam->test_series)->id)->exists();
    }
}
