@extends('students.dashboard.master')

@section('page-title')
    Exam Dashboard
@endsection


@section('content')
<div class="content">
    <div class="container">
        @forelse ($exams as $exam)    
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">content_paste</i>
                    </div>
                    <p class="card-category">{{ $exam->subject }}</p>
                    <h3 class="card-title">{{ $exam->topic }}</h3>
                </div>
                <div class="card-footer">
                    <div>
                        <div class="stats mr-2">
                            <i class="material-icons text-info">flag</i>
                            <a href="javascript:;">{{ $exam->marks }}</a>
                        </div>
                        <div class="stats">
                            <i class="material-icons text-danger">watch_later</i>
                            <a href="javascript:;">{{ $exam->time }} Min.</a>
                        </div>
                    </div>
                    <div>
                        <a onclick="startExam()" class='btn btn-info btn-sm text-white py-2 px-3'>Take Exam</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-header card-header-info">
                    <strong>No Data Available</strong>
                </div>
                <div class="card-body">
                    <p class="card-text">No exams are available.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var examWindow;
        function startExam() {
            examWindow = window.open('{{ route('exam.instructions') }}', '_blank', 'location=yes,scrollbars=yes,status=yes');
            examWindow.onbeforeunload = function () {
                window.location = '{{ route("students.results") }}';
            }
        }

    </script>    
@endpush