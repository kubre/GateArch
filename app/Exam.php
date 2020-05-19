<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'topic', 'subject', 'time', 'marks', 'instructions'
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
