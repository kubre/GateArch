@extends('students.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <a href="#" onclick="window.open('/exam/instructions', '_blank', 'location=yes,scrollbars=yes,status=yes')" class="btn btn-success">Take Demo Exam</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection