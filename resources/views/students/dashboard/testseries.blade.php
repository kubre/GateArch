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
                    <p class="card-text">{!! Str::of($series->description)->limit(100) !!}</p>
                    <strong>Purchasing this Test Series will unlock: </strong>
                    <ul>
                        @foreach ($series->exams as $exam)
                            <li>{{ $exam->topic }}</li>
                        @endforeach
                    </ul>
                    <div class="d-flex align-items-center"><span class="material-icons mr-2">today</span> Available from: {{ optional($series->start_date)->format('d M Y') ?? $series->created_at->format('d M Y') }}</div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <x-discount 
                            prefix="Price: "
                            price="{{ $series->price }}"
                            discount="{{ $series->discount }}"
                            discountedPrice="{{ $series->discounted_price }}"
                            />
                        <a 
                        href="{{ route('students.purchase.show', $series->id) }}"
                        class='btn {{ $series->price == 0 ? "btn-success" : "bg-gate" }} btn-sm text-white py-2 px-3'>Click here for details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-header bg-gate card-header-info">
                    <strong>No Data Available</strong>
                </div>
                <div class="card-body">
                  profile  <p class="card-text">No sreies available.</p>
                </div>
            </div>
        @endforelse
        {{ $serieses->links() }}
    </div>
</div>
@endsection