<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Exam extends Model
{
    protected $fillable = [
        'topic', 'subject', 'time', 'marks', 'instructions', 'start_at', 'end_at',
    ];

    protected $dates = [
        'start_at', 'end_at',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function test_series()
    {
        return $this->belongsTo(TestSeries::class);
    }

    public function sectionsSorted()
    {
        $sectionSorted = $this->sections->map(function ($section) {
            return collect($section->questions)->sortBy('number', SORT_NUMERIC)->values()->all();
        });
        $s = $this->sections;
        $sectionSorted->each(function ($questions, $i) use ($s) {
            $s[$i]->questions = $questions;
        });
        return $s;
    }

    public function getValidExams()
    {
        // (start_at is null or start_at <= current_date) and (end_at is null or end_at >= current_date)
        return $this
            ->where(function ($query) {
                $query->whereNull('start_at')
                    ->orWhere('start_at', '<=', Carbon::today());
            })
            ->where(function ($query) {
                $query->whereNull('end_at')
                    ->orWhere('end_at', '>=', Carbon::today());
            });
    }

    public function isValid()
    {
        return $this->isStarted() && !$this->isFinished();
    }

    public function isStarted()
    {
        return is_null($this->start_at) || $this->start_at->isBefore(Carbon::tomorrow());
    }

    public function isFinished()
    {
        return (bool) optional($this->end_at)->isBefore(Carbon::today());
    }
}
