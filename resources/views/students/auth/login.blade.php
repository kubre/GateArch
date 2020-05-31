@extends('students.exam.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <img src="/images/student.png" height="150" style='object-fit: contain' class="card-img-top">
            <form method="POST" action="{{ $loginRoute }}">
            <div class="card py-3">
                <div class="card-body px-4">
                    <h3 class='card-title text-center'>Student Login</h3>
                    @csrf
                    <div class="form-group">
                        <label for="email">E-Mail ID</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            value="{{ old('password') }}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>


                    @if(Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    </div>
                    <div class="card-footer px-2">
                        <button type="submit" class="btn btn-info btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection