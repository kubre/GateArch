@extends('students.exam.master')


@section('header')
    <style>
        html, body {
            height: 100%;
        }
    </style>
@endsection

@section('content')
<div class="w-100 d-flex h-100 align-items-stretch">
    <div style="color: #dfdfdf;" class="w-25 bg-dark d-flex flex-column align-items-center justify-content-center px-4">
        {{-- <img src="/images/student.png" height="150" style='object-fit: contain'> --}}
        <h3><i class="material-icons mr-2" style="font-size: 1.5em;vertical-align: bottom">school</i><span>Register</span></h3>
        <p>Already have an account? <a class="text-info" href="{{ route('students.login.show') }}">Sign In</a></p>
    </div>
    <div class="w-50 bg-white h-100 px-5 d-flex align-items-center justify-content-center" style="box-shadow: 10px 1px 32px 2px rgba(0,0,0,0.16); overflow-y: auto">
        <form class='w-100' method="POST" action="{{ route('students.register') }}">
            <div style='max-width: 650px;' class="p-5 mx-auto">
                @csrf
                <div id='first'>
                <h3>Basic Details</h3>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="name">First Name</label>

                        <input id="firstname" type="firstname" class="form-control @error('firstname') is-invalid @enderror"
                            name="firstname" value="{{ old('firstname') }}">

                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="middlename">Middle Name</label>

                        <input id="middlename" type="middlename" class="form-control @error('middlename') is-invalid @enderror"
                            name="middlename" value="{{ old('middlename') }}">

                        @error('middlename')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="lastname">Last Name</label>

                        <input id="lastname" type="lastname" class="form-control @error('lastname') is-invalid @enderror"
                            name="lastname" value="{{ old('lastname') }}">

                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class='bmd-label-floating' for="email">Email</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class='bmd-label-floating' for="mobile">Mobile No.</label>

                        <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror"
                            name="mobile" value="{{ old('mobile') }}">

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button onclick='$("#first").slideUp(); $("#second").slideDown();' type="button" style='background: #343a40' class="btn btn-light btn-block">
                        Next
                    </button>
                </div>
                </div>

                
                <div id='second' style="display: none;">
                <h3>Other Details</h3>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="dob">Date of Birth</label>

                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror"
                            name="dob" value="{{ old('dob') }}">

                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="college_name">College Name</label>

                        <input id="college_name" type="text"
                            class="form-control @error('college_name') is-invalid @enderror" name="college_name"
                            value="{{ old('college_name') }}">

                        @error('college_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="bmd-label-floating">Graduation Details</label>
                        <select class="form-control custom-select @error('graduation_status') is-invalid  @enderror"
                            name="graduation_status" id="graduation_status" placeholder="Select Status">
                            <option disabled selected>Select Graduation Details</option>
                            <option
                                {{ old('graduation_status') == 'appearing' ? 'selected' : '' }}
                                value="appearing">Appearing</option>
                            <option
                                {{ old('graduation_status') == 'passed' ? 'selected' : '' }}
                                value="passed">Passed</option>
                        </select>
                        @error('graduation_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class='bmd-label-floating' for="graduation_year">Graduation Year (if passed)</label>

                        <input id="graduation_year" type="number"
                            class="form-control @error('graduation_year') is-invalid @enderror"
                            name="graduation_year" value="{{ old('graduation_year') }}">

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
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            value="{{ old('password') }}">

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
                            name="password_confirmation"
                            value="{{ old('password_confirmation') }}">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="" for="terms">
                        <input class="mr-1 @error('terms') is-invalid @enderror" type="checkbox" name="terms"
                            id="terms"
                            {{ old('terms') ? 'checked' : '' }}>
                        I've read all the
                        <a class='text-info' href="/terms-and-condtions">Terms &amp; Condtions</a>, and I agree to those conditions
                        beofer registering.
                    </label>
                    @error('terms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3 row">
                    <div class="col-4">
                        <button  onclick='$("#second").slideUp(); $("#first").slideDown();' type="button" style='border: 1px solid #343a40' class="btn btn-dark btn-block">
                            Back
                        </button>
                    </div>
                    <div class="col">
                        <button type="submit" style='background: #343a40' class="btn btn-light btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
    <div class="w-25">

    </div>
</div>
@endsection