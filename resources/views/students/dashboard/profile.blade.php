@extends('students.dashboard.master')

@section('page-title')
    Student Profile
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
            @if (session('status'))
                <div class="my-3 alert alert-success">{{ session('status') }}</div>
            @endif
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body px-5">
                <form method="POST" action="{{ route('students.profile.update') }}">
                @csrf
                <div id='first'>
                <h3>Basic Details</h3>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="mobile">Mobile No.</label>

                        <input id="mobile" pattern="\d{10}" maxlength="10" minlength="10" class="form-control @error('mobile') is-invalid @enderror"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        name="mobile" value="{{ old('mobile') ?: $user->mobile }}">

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <p class="text-muted">If you change your mobile number, you'd be logged out and an OTP will be sent for verification of new mobile number.</p>
                </div>
                </div>

                <div id='second'>
                <h3>Other Details</h3>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="college_name">College Name</label>

                        <input id="college_name" type="text"
                            class="form-control @error('college_name') is-invalid @enderror" name="college_name"
                            value="{{ old('college_name') ?: $user->college_name }}">

                        @error('college_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col">
                        <label class="bmd-label-floating pl-3">  Graduation Details</label>
                        <select class="form-control custom-select @error('graduation_status') is-invalid  @enderror"
                            name="graduation_status" id="graduation_status" placeholder="Select Status">
                            <option
                                {{ (old('graduation_status') ?: $user->graduation_status) == 'appearing' ? 'selected' : '' }}
                                value="appearing">Appearing</option>
                            <option
                                {{ (old('graduation_status') ?: $user->graduation_status) == 'passed' ? 'selected' : '' }}
                                value="passed">Passed</option>
                        </select>
                        @error('graduation_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col" style="{{ (old('graduation_year') ?: $user->graduation_year) ?: 'display: none' }}">
                        <label class='bmd-label-floating' for="graduation_year">Graduation Year (if passed)</label>

                        <select class="form-control @error('graduation_year') is-invalid @enderror" name="graduation_year" id="graduation_year">
                            @for ($i = date('Y'); $i > date('Y') - 20; $i--)
                                <option @if((old('graduation_year') ?: $user->graduation_year) == $i) selected @endif value="{{ $i }}">
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>

                        @error('graduation_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="password">Password</label>

                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password">

                        <span class="help-block text-muted">Password must be 8 characters long and must contain a letter, a number and a symbol from (!, @, $, #, %).</span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="password_confirmation">Confirm Password</label>

                        <input id="password_confirmation" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                <div class="form-group mt-3 row">
                    <div class="col-md-6">
                        <button id="submit" type="submit" class="btn btn-info btn-block">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar bg-info text-white pt-3 pb-1 px-4">
                       <h1>{{ $user->name[0] }}</h1> 
                    </div>
                    <div class="card-body">
                    <h6 class="card-category text-gray">{{ $user->email  }}</h6>
                    <h4 class="card-title">{{ $user->name }}</h4>
                    <p>Date of Birth: {{ date('d M Y', strtotime($user->dob)) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function() {
            checkstatus()
            $("#graduation_status").change(checkstatus);
        });

        function checkstatus() {
             $('#graduation_status').val() == 'passed' ? $('#graduation_year').parent().show() : $('#graduation_year').parent().hide()
        }
    </script>
@endpush