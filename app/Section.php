<?php

namespace App;

use App\Casts\Question;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'title', 'number', 'questions', 'exam_id'
    ];

    protected $casts = [
        'questions' => 'array'
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
