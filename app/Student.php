<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticable
{
    use Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'name', 'email', 'mobile', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
