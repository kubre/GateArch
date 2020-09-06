@extends('students.dashboard.master')

@section('page-title')
    Results Dashboard
@endsection

@section('content')
<div class="content">
    <div id='resultList' class="container">
        @forelse ($results as $result) 
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon bg-gate-alt">
                    <i class="material-icons">library_books</i>
                    </div>
                    <p class="card-category">{{ $result->exam->subject }}</p>
                    <h3 class="card-title">{{ $result->exam->topic }}</h3>
                </div>
                <div class="card-footer">
                    <div>
                        <div class="stats mr-2">
                            <i class="material-icons">flag</i>
                            <span class='text-dark'>Obtained Marks: <strong>{{ $result->total_marks }}</strong></span>
                        </div>
                        <div class="stats mr-2">
                            <i class="material-icons">watch_later</i>
                            <span class='text-dark'>Time Taken: <strong>{{ $result->time_taken }}</strong></span>
                        </div>
                        <div class="stats">
                            <i class="material-icons">event</i>
                            <span class='text-dark'>Date & Time: <strong>{{ $result->created_at->format('d/m/y h:j') }}</strong></span>
                        </div>
                    </div>
                    <div>
                        <a onclick="showOverview({{ $result->total_questions}}, {{ $result->max_marks }}, {{ $result->total_attempted }}, {{ $result->correct_answers }}, {{ $result->total_time }}, '{{ $result->time_taken }}', {{ $result->right_marks }}, {{ $result->negative_marks }}, {{ $result->total_marks }}, '{{ $result->getRank() }}')" class='btn bg-gate btn-light btn-sm text-white py-2 px-3'>Overview</a>
                        <a href='{{ route('students.solution', $result->id) }}' class='btn bg-gate btn-light btn-sm text-white py-2 px-3'>Solution</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-header card-header-info">
                    <strong>No Data Available</strong>
                </div>
                <div class="card-body">
                    <p class="card-text">Take tests to see the results here.</p>
                </div>
            </div>
        @endforelse
    </div>
    <div id='resultOverview'>
    </div>
    <div class="container mb-5">
        {{ $results->links() }}
    </div>
</div>
@endsection

@push('scripts')
    <script>
        function loadOverview(res) {
            Swal.close();
            $("#resultOverview").html(res.data);
            $('#resultOverview #btnResultAction').text('Back');
            $('#resultList').slideUp();
            $('#resultOverview').slideDown();
            $('#resultOverview #btnResultAction').click(function() {
                $('#resultList').slideDown();
                $('#resultOverview').slideUp();
            });
        }

        function showOverview(total_questions, max_marks, total_attempted, correct_answers, total_time, time_taken, right_marks, negative_marks, total_marks, rank) {
            Swal.fire({
            'text': 'Please wait...',
            onOpen: function() {
                Swal.showLoading();
                return axios.get('{{ route('exam.end') }}?'+
                'totalQuestions='+ total_questions+
                '&totalAttempted='+ total_attempted+
                '&correctAnswers='+ correct_answers+
                '&rightMarks='+ right_marks+
                '&negativeMarks='+ negative_marks+
                '&totalMarks='+  total_marks+
                '&totalTime='+ total_time +
                '&timeTaken='+ time_taken +
                '&maxMarks='+ max_marks +
                '&rank='+rank)
                .then(loadOverview)
                }
            });
        }
    </script>
@endpush