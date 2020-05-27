@extends('students.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <a href="#" onclick="startExam()" class="btn btn-success">Take Demo Exam</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var examWindow;
        function startExam() {
            examWindow = window.open('{{ route('exam.instructions') }}', '_blank', 'location=yes,scrollbars=yes,status=yes');
        }

    </script>    
@endpush