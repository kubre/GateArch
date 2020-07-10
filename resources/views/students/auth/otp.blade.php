@extends('students.exam.master')

@section('content')
<div class="container pt-5" style="max-width: 600px">

    @isset($resend)
    <div class="alert alert-success mb-4 px-3 pb-1">
        <p>OTP code resent.</p>
    </div>
    @endisset

    <div class="card">
        <div class="card-header card-header-warning">
            You've been sent an OTP on your registered mobile number: {{ auth('student')->user()->mobile}}
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('students.otp.verify') }}">
                @csrf
                <div class="form-group">
                    <label for="otp" class="bmd-floating-label">Enter the OTP</label>
                    <input type="text" name="otp" id="otp" class="form-control">

                    @error('otp')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button id="verify" name="verify" class="btn btn-success" type="submit">Verify</button>
                </div>
                
                <div id="resendMsg" class="text-muted mt-3">
                    Wait for 1 minute to resend the OTP again.
                </div>
                <div id="resend" class="form-group" style="display: none">
                    <a href="{{ route('students.otp.verify.resend') }}" class="btn btn-info" type="submit">Resend OTP</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function() {
            setTimeout(function () {
                $("#resend").slideDown();
            }, 60000); 
        });
    </script>
@endpush