
@extends('students.dashboard.master')

@section('page-title')
    Exam Dashboard
@endsection


@section('content')
<div class="content">
   @if(session('message'))
        <div class="container alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container grid-3">
        @forelse ($tests as $test)
        <div class="card m-0">
            <div class="card-header">
                {{ $test->title }}
            </div>
            <div class="card-footer">
                <a class="btn bg-gate btn-info py-2 px-3" href="{{ route('students.myexams', $test) }}">See Exams</a>
            </div>
        </div> 
        @empty
            <div class="card">
                <div class="card-header bg-gate card-header-info">
                    <strong>No Test Series in your account.</strong>
                </div>
                <div class="card-body">
                    <p class="card-text">Please purchase Test Series to see exams under them available here to attend. There are also free test series to attend make sure you add them from Test Series section.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
