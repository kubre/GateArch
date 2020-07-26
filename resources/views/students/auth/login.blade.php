<x-layout>

<x-slot name="header">
    <style>
        html, body {
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }

        .login-wrapper {
            min-height: 450px;
        }

        @media screen and (min-width: 991px) {
            .login-wrapper {
                min-height: calc(54vh - 6px);
            }
        }
    </style>
</x-slot>

<div class="row align-items-stretch">
<div style="color: #dfdfdf;" class="col-md-3 bg-dark d-flex flex-column align-items-center justify-content-between px-4 pt-2 pb-3 py-md-5 hidden-md-down">
    <img src="/images/index/logo-negative-v.png" class="d-none d-md-inline-block" style="max-width: 100px;">
    <div class="text-center">
        <h3>Login</h3>
        <hr style="width: 80px;background: #ff9900">
        <p>Don't have an account <a class="text-info" href='{{ route('students.register.show') }}'><strong>Sign Up now!</strong></a></p>
    </div>
    <a style="color: #1188aa;" href="/terms-and-conditions">Terms &amp; Conditions</a>
</div>
<div class="col bg-white px-3 px-md-5 d-flex align-items-center justify-content-center" style="box-shadow: 10px 1px 32px 2px rgba(0,0,0,0.16); overflow-y: auto">
    <form class='w-100' method="POST" action="{{ route('students.login') }}">
        <div style='max-width: 650px;' class="login-wrapper pt-5 px-5 pb-3 mx-auto d-flex flex-column justify-content-center align-items-stretch">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="email">E-Mail ID</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group col-md-12">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        value="{{ old('password') }}">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input class="mr-1" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="form-group mt-0">
                <button type="submit" style='background: #343a40' class="btn btn-light btn-block">
                    {{ __('Login') }}
                </button>
            </div>

            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            </div>
    </form>
</div>
<div class="col-md-3">
</div>
</div>
</x-layout>
