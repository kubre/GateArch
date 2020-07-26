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
        <h3>Reset Password</h3>
        <hr style="width: 80px;background: #ff9900">
    </div>
    <a style="color: #1188aa;" href="/terms-and-conditions">Terms &amp; Conditions</a>
</div>
<div class="col bg-white px-3 px-md-5 d-flex align-items-center justify-content-center" style="box-shadow: 10px 1px 32px 2px rgba(0,0,0,0.16); overflow-y: auto">
   <form class="w-100" method="POST" action="{{ route('password.update') }}">
   <div style='max-width: 650px;' class="login-wrapper pt-5 px-5 pb-3 mx-auto d-flex flex-column justify-content-center align-items-stretch">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email" class="bmd-label-floating">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="bmd-label-floating">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="bmd-label-floating">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group mt-4">
                <button type="submit" style="background: #343a40" class="btn btn-light btn-block">
                    {{ __('Reset Password') }}
                </button>
            </div>
    </div>
    </form>
</div>
<div class="col-md-3">
</div>
</div>
</x-layout>