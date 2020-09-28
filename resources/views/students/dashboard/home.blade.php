@extends('students.dashboard.master')
@section('page-title')
    Dashboard
@endsection

@section('content')
<div class="container-fluid px-5">

    @if(date('dm') == date('dm', strtotime($user->dob)))
    <div style="width: max-content" class="card mx-auto">
        <div class="card-body">
            🎂 &nbsp;&nbsp; Happy Birthday, {{ explode(" ", $user->name)[0] }}!
        </div>
    </div>
    @endif
    <div class="card mx-auto bg-gate shadow-md">
        <div class="card-body">
           <strong>Note: Please use desktop/laptop device to take exams.</strong>
        </div>
    </div>



    @empty($user->email_verified_at)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">{{ __('Verify Your Email Address') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endempty

    <h3>Latest Blog Post</h3>
    <a style="display: block" href="{{ route('posts', $post->id) }}">
    <div class="container-fluid d-flex flex-column justify-content-center pb-1 post-wrapper card">
        <div class="card-body">
        <h3 class="card-title text-gate">{{ $post->title }}</h3>
            <div class="mt-2 row">
                <div class="d-flex align-items-center col-md-6"><span class="material-icons mr-2">today</span>Published On: &nbsp;<strong>{{ $post->publish_date }}</strong></div>
                <div class="d-flex align-items-center col-md-6"><span class="material-icons mr-2">person</span>Written By: &nbsp;<strong>{{ $post->writer_name }}</strong></div>
            </div>
        <div class="d-flex align-items-center my-2"><span class="material-icons mr-2">label</span>Tags: &nbsp;<strong>{{ $post->tags }}</strong></div>
        </div>
    </div>
    </a>
    {{-- @empty ($user->member_at)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success">
                    Become a Plus Member
                </div>
                <div class="card-body">
                    <p class="card-text">Unlock all exams, support GateArch, receive badge(✅) next to your profile and many more benefits <a stye="font-weight: bold" href="{{ route('students.membership.show') }}">Click here for more info</a></p>
                </div>
            </div>
        </div>
    </div>
    @endempty --}}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon bg-gate">
                            <i class="material-icons">content_paste</i>
                            </div>
                            <p class="card-category">Total Exams Modules Available</p>
                            <h3 class="card-title">{{ $exams_count }}</h3>
                        </div>
                        <div class="card-footer">
                            <div>
                                <a href='{{ route('students.exams') }}' class='btn bg-gate-alt btn-info btn-sm text-white py-2 px-3'>More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon bg-gate">
                            <i class="material-icons">library_books</i>
                            </div>
                            <p class="card-category">Total Results</p>
                            <h3 class="card-title">{{ $results_count }}</h3>
                        </div>
                        <div class="card-footer">
                            <div>
                                <a href='{{ route('students.results') }}' class='btn bg-gate-alt btn-info btn-sm text-white py-2 px-3'>More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection