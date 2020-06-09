<?php

namespace App;

use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticable implements MustVerifyEmail
{
    use Notifiable, MustVerifyEmailTrait;

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
}
