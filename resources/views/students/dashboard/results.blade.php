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
                    <div class="card-icon">
                    <i class="material-icons">library_books</i>
                    </div>
                    <p class="card-category">{{ $result->exam->subject }}</p>
                    <h3 class="card-title">{{ $result->exam->topic }}</h3>
                </div>
                <div class="card-footer">
                    <div>
                        <div class="stats mr-2">
                            <i class="material-icons text-info">flag</i>
                            <a class='text-dark' href="javascript:;">Obtained Marks: <strong>{{ $result->total_marks }}</strong></a>
                        </div>
                        <div class="stats mr-2">
                            <i class="material-icons text-warning">watch_later</i>
                            <a class='text-dark' href="javascript:;">Time Taken: <strong>{{ $result->time_taken }}</strong></a>
                        </div>
                        <div class="stats">
                            <i class="material-icons text-success">event</i>
                            <a class='text-dark' href="javascript:;">Date & Time: <strong>{{ $result->created_at->format('d/m/y h:j') }}</strong></a>
                        </div>
                    </div>
                    <div>
                        <a onclick="showOverview({{ $result->total_questions}}, {{ $result->max_marks }}, {{ $result->total_attempted }}, {{ $result->correct_answers }}, {{ $result->total_time }}, '{{ $result->time_taken }}', {{ $result->right_marks }}, {{ $result->negative_marks }}, {{ $result->total_marks }})" class='btn btn-info btn-sm text-white py-2 px-3'>Overview</a>
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

        function showOverview(total_questions, max_marks, total_attempted, correct_answers, total_time, time_taken, right_marks, negative_marks, total_marks) {
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
                '&timeTaken='+ time_taken+
                '&maxMarks='+ max_marks)
                .then(loadOverview)
                }
            });
        }
    </script>
@endpush