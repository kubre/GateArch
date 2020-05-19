<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
