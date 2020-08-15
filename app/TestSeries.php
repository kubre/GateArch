<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TestSeries extends Model
{
    protected $casts = [
        'price' => 'int'
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function validExams()
    {
        // (start_at is null or start_at <= current_date) and (end_at is null or end_at >= current_date)
        return $this
            ->hasMany(Exam::class)
            ->where(function ($query) {
                $query->whereNull('start_at')
                    ->orWhere('start_at', '<=', Carbon::today());
            })
            ->where(function ($query) {
                $query->whereNull('end_at')
                    ->orWhere('end_at', '>=', Carbon::today());
            });
    }
}
