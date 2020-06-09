@extends('students.dashboard.master')

@section('page-title')
    Solution
@endsection

@section('content')
<div class="content">
    <div class="container">
        <div class="card">
            <div class="card-header card-header-info">
                Solutions
            </div>
            <div class="card-body">
                <h5 class="card-title"> <button type='button' onclick="window.location = '{{ route('students.results') }}'" class="btn btn-warning bmd-btn-fab-sm bmd-btn-icon"><i class="material-icons">arrow_back</i></button> Choose from following the sesctions</h5>
                <div class="btn-group">
                    @foreach ($sections as $section)
                        <a href="#" onclick="showSection({{ $section->id }})" class="btn btn-outline-danger btn-id btn-id-{{ $section->id }}">{{ $section->title }}</a>
                    @endforeach
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Question No.</th>
                            <th>Question</th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            @foreach ($section->questions as $question)
                                <tr class="sec sec-{{ $section->id }}">
                                    <td>{{ $question['number'] }}</td>
                                    <td>
                                        <img class='d-block mb-1' src="/storage/{{ $question['image'] }}">
                                        <button onclick="$(this).siblings('p').fadeToggle()" class='btn btn-info btn-sm'>Show Solution</button>
                                        <p style="display: none; margin-top: 20px;"><strong>Solution: </strong> {{ $question['solution'] ?: '-- No Solution --' }}</p>
                                    </td>
                                    <td>
                                        Correct Answer: {{ $question['answer'] }}<br>
                                        Given Answer: {{ $result->answers[$section->id][$question['number']] ?? '-' }}<br>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        showSection({{ $sections->first()->id }});
        function showSection(id) {
            $('.sec').hide();
            $('.btn-id').removeClass('active');
            $('.sec-'+id).fadeIn();
            $('.btn-id-'+id).addClass('active');
        }
    </script>
@endpush