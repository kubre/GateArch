<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $number, $image, $type, $answer, $marks, $negative;
    public function __construct($number, $image, $type, $answer, $marks, $negative)
    {
        $this->number = $number;
        $this->image = $image;
        $this->type = $type;
        $this->answer = $answer;
        $this->marks = $marks;
        $this->negative = $negative;
    }
}
