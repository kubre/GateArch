@extends('students.master')

@section('content')
<div id='resultApp' class="container my-5">
    <x-exam.result
        total-questions='{{ $totalQuestions }}'
        max-marks='{{ $maxMarks }}'
        total-attempted='{{ $totalAttempted }}'
        correct-answers='{{ $correctAnswers }}'
        total-time='{{ $totalTime }}'
        time-taken='{{ $timeTaken }}'
        right-marks='{{ $rightMarks }}'
        negative-marks='{{ $negativeMarks }}'
        >

        <button class='btn btn-success active'>Continue</button>
    </x-exam.result>
</div>
@endsection