@extends('students.dashboard.master')

@section('page-title')
    Exam Dashboard
@endsection


@section('content')
<div class="content">
    <div class="container">
        @foreach ($exams as $exam)
            <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon bg-gate">
                <i class="material-icons">content_paste</i>
                </div>
                <p class="card-category">{{ $exam->subject }}</p>
                <h3 class="card-title">{{ $exam->topic }}</h3>
            </div>
            <div class="card-footer">
                <div>
                    <div class="stats">
                        <i class="material-icons">flag</i>
                        <span>Marks: {{ $exam->marks }}</span>
                    </div>
                    <div class="stats ml-2">
                        <i class="material-icons">watch_later</i>
                        <span>Time: {{ $exam->time }} min</span>
                    </div>
                    <div class="stats ml-2 text-success">
                        <i class="material-icons">today</i>
                        <span>Start: {{ optional($exam->start_at)->format('d M Y') ?? '-' }}</span>
                    </div>
                    <div class="stats ml-2 text-danger">
                        <i class="material-icons">today</i>
                        <span>End: {{ optional($exam->end_at)->format('d M Y') ?? '-' }}</span>
                    </div>
                </div>
                <div>
                    @if($exam->isValid())
                    <a 
                    onclick="startExam('{{ route('exam.instructions', $exam->id) }}')"
                    class='btn bg-gate-alt btn-danger btn-sm text-white py-2 px-3'>Take Exam</a>
                    @elseif(!$exam->isStarted())
                    <a href="#" class="btn btn-danger btn-sm disabled text-white py-2 px-3">Not Started</a>
                    @elseif($exam->isFinished())
                    <a href="#" class="btn btn-danger btn-sm disabled text-white py-2 px-3">Expired</a>
                    @else
                    {{ $exma->isStarted(). ' - '. $exam->isFinished() }}
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var examWindow;
        function startExam(url) {
            examWindow = window.open(url, '_blank', 'location=yes,scrollbars=yes,status=yes');
            examWindow.onbeforeunload = function () {
                window.location = '{{ route('students.results') }}';
            }
        }

    </script>    
@endpush