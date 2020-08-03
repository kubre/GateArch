@extends('students.dashboard.master')

@section('page-title')
    Exam Dashboard
@endsection


@section('content')
<div class="content">
    <div class="container grid-3">
        @forelse ($exams as $exam)    
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
                            <span>{{ $exam->marks }}</span>
                        </div>
                        <div class="stats ml-2">
                            <i class="material-icons">watch_later</i>
                            <span>{{ $exam->time }} Min.</span>
                        </div>
                        <div class="stats ml-2">
                            <i class="material-icons">today</i>
                            <span>{{ $exam->created_at }}</span>
                        </div>
                    </div>
                    <div>
                        <a 
                        onclick="startExam('{{ route('exam.instructions', $exam->id) }}')"
                        class='btn bg-gate-alt btn-info btn-sm text-white py-2 px-3'>Take Exam</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-header bg-gate card-header-info">
                    <strong>No Data Available</strong>
                </div>
                <div class="card-body">
                    <p class="card-text">No exams are available.</p>
                </div>
            </div>
        @endforelse
        {{ $exams->links() }}
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