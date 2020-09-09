<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class TestSeries extends Model
{


    protected $fillable = [
        'title', 'description', 'price', 'discount', 'start_date'
    ];

    protected $casts = [
        'price' => 'int',
        'discount' => 'float',
    ];

    protected $dates = [
        'start_date',
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function getDiscountedPriceAttribute()
    {
        return $this->price - round($this->price * $this->discount / 100, 0);
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

    public function isStarted()
    {
        return is_null($this->start_date) || $this->start_date->isBefore(Carbon::tomorrow());
    }
}
