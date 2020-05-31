@extends('students.dashboard.master')
@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                            <i class="material-icons">content_paste</i>
                            </div>
                            <p class="card-category">Total Exams Moudles Available</p>
                            <h3 class="card-title">{{ $exams_count }}</h3>
                        </div>
                        <div class="card-footer">
                            <div>
                                <a href='{{ route('students.exams') }}' class='btn btn-info btn-sm text-white py-2 px-3'>More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                            <i class="material-icons">library_books</i>
                            </div>
                            <p class="card-category">Total Results</p>
                            <h3 class="card-title">{{ $results_count }}</h3>
                        </div>
                        <div class="card-footer">
                            <div>
                                <a href='{{ route('students.exams') }}' class='btn btn-info btn-sm text-white py-2 px-3'>More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection