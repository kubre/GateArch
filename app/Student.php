<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticable implements MustVerifyEmail
{
    use Notifiable, MustVerifyEmailTrait, MustVerifyMobile;

    protected $guard = 'student';

    protected $fillable = [
        'name', 'photo', 'mobile', 'email', 'dob', 'college_name', 'graduation_status', 'graduation_year', 'password', 'email_verified_at'
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

    public function payments()
    {
        return $this->hasMany(Payment::class)->orderBy('created_at', 'DESC');
    }
}
