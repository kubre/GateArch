<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestSeries extends Model
{
    protected $casts = [
        'price' => 'int'
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
