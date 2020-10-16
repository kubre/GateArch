<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $casts = [
        'answers' => 'array'
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function getTotalMarksAttribute()
    {
        return $this->right_marks - round($this->negative_marks, 2);
    }

    public function calculate($data)
    {
        $totalQuestions = 0;
        $totalAttempted = 0;
        $correct = 0;
        $rightMarks = 0;
        $negativeMarks = 0;

        foreach ($data['sections'] as $section) {
            foreach ($section['questions'] as $question) {
                $totalQuestions++;
                if (!empty($question['userAnswer'])) {
                    $totalAttempted++;
                    $ans = explode(",", $question['answer']);
                    $isCorrect = false;
                    if ($question['type'] == 'mcq') {
                        $isCorrect = in_array($question['userAnswer'], $ans);
                    } elseif($question['type'] == 'msq') {
                        $isCorrect = empty(array_diff($question['userAnswer'], $ans));
                    } else {
                        if (count($ans) == 1)
                            $isCorrect = $ans[0] == $question['userAnswer'];
                        else
                            $isCorrect = $question['userAnswer'] >= $ans[0] && $question['userAnswer'] <= $ans[1];
                    }

                    if ($isCorrect) {
                        $rightMarks += (float) $question['marks'];
                        $correct++;
                    } elseif ($question['negative'] != '0') {
                        $negativeMarks += (float) ($question['negative'] == '1/3' ? 1 / 3 : 2 / 3);
                    }
                }
            }
        }

        list($m, $s) = explode(':', $data['time']);

        $this->exam_id = $data['sections'][0]['exam_id'];
        $this->total_questions = $totalQuestions;
        $this->max_marks = $data['marks'];
        $this->total_attempted = $totalAttempted;
        $this->correct_answers = $correct;
        $this->total_time = $data['totalTime'];
        $this->time_taken = ($data['totalTime'] - $m - ($s == '0' ? 0 : 1)) . ':' . (($s == '0' ? '00' : 60 - $s));
        $this->right_marks = $rightMarks;
        $this->negative_marks = round($negativeMarks, 2);
        $this->answers = $this->transformSectionForStoring($data['sections']);
    }

    public function store($sections, $id)
    {
        $this->calculate($sections);
        $this->student_id = $id;
        $this->save();
        return $this;
    }

    /**
     * Reduces section to just id and questions answers
     *
     * @param array $sections
     * @return array
     */
    public function transformSectionForStoring($sections)
    {
        return array_filter(array_map(
            function ($section) {
                return array_column($section, 'userAnswer', 'number');
            },
            array_column($sections, 'questions', 'id')
        ), "count");
    }

    public function getRank()
    {
        // returns rank/total ex. 23/390
        return
            $this->where('exam_id', $this->exam_id)
            ->whereRaw('right_marks - negative_marks >= ?', $this->total_marks)->count() . '/' . $this->where('exam_id', $this->exam_id)->count();
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
