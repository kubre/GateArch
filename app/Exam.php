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
}
