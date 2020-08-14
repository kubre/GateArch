@extends('students.dashboard.master')

@section('page-title')
    Test Series Dashboard
@endsection


@section('content')
<div class="content">
    <div class="card container">
        <div class="card-body">Once added/purchased your Test Series exams will be visible under 'My Exams' section in menu.</div>
    </div>
    <div class="container grid-3">
        @forelse ($serieses as $series)    
            <div class="card">
                <div class="card-header card-header-success bg-gate">
                    <h3 class="card-title">{{ $series->title }}</h3>
                </div>
                <div class="card-body">
                    <strong>Purchasing this Test Series will unlock: </strong>
                    <ul>
                        @foreach ($series->exams as $exam)
                            <li>{{ $exam->topic }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <div>
                        <a 
                        href="{{ route('students.purchase.show', $series->id) }}"
                        class='btn {{ $series->price == 0 ? "btn-success" : "bg-gate" }} btn-sm text-white py-2 px-3'>
                        Add for {{ $series->price == 0 ? "Free" : "₹ $series->price" }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-header bg-gate card-header-info">
                    <strong>No Data Available</strong>
                </div>
                <div class="card-body">
                  profile  <p class="card-text">No exams are available.</p>
                </div>
            </div>
        @endforelse
        {{ $serieses->links() }}
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