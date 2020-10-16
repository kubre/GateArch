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
            @if($sections->isNotEmpty())
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
                                        <p style="display: none; margin-top: 20px;"><strong>Solution: </strong> <img src="/storage/{{ $question['solution'] }}" alt="-- No Solution --"> </p>
                                    </td>
                                    <td>
                                        @php
                                        $givenAnswer = empty($result->answers[$section->id][$question['number']]) ? null : $result->answers[$section->id][$question['number']];
                                        @endphp
                                        <strong>Question Type:</strong><br>
                                        {{ strtoupper($question['type']) }}
                                        <br><br>
                                        <strong>Correct Answer:</strong><br>{{ $question['answer'] }}<br><br>
                                        <strong>Given Answer:</strong>
                                        <br>{{ is_null($givenAnswer) ? 'Not Attempted' :
                                        (is_array($givenAnswer) ? implode(',', $givenAnswer) : $givenAnswer)}}<br>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="card-body">
                <strong>Data not available!</strong>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        @if($sections->isNotEmpty())
        showSection({{ $sections->first()->id }});
        @endif
        function showSection(id) {
            $('.sec').hide();
            $('.btn-id').removeClass('active');
            $('.sec-'+id).fadeIn();
            $('.btn-id-'+id).addClass('active');
        }
    </script>
@endpush