@extends('students.exam.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="POST" action="{{ route('students.register') }}">
            <div class="card py-3">
                <div class="card-header card-header-success">
                    <h3 class='card-title text-center'>Register as a Student</h3>
                </div>
                <div class="card-body px-4">
                    @csrf
                    
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class='bmd-label-floating' for="name">Full Name (First Middle Last)</label>

                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class='bmd-label-floating' for="email">Email</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class='bmd-label-floating' for="mobile">Mobile No.</label>

                            <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                value="{{ old('mobile') }}">

                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class='bmd-label-floating' for="dob">Date of Birth</label>

                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob"
                                value="{{ old('dob') }}">

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

                            <input id="college_name" type="text" class="form-control @error('college_name') is-invalid @enderror" name="college_name"
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
                            <select class="form-control custom-select @error('graduation_status') is-invalid  @enderror" name="graduation_status" id="graduation_status" placeholder="Select Status">
                                <option disabled selected>Select Graduation Details</option>
                                <option {{ old('graduation_status') == 'appearing' ? 'selected' : '' }} value="appearing">Appearing</option>
                                <option {{ old('graduation_status') == 'passed' ? 'selected' : '' }} value="passed">Passed</option>
                            </select>
                            @error('graduation_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class='bmd-label-floating' for="graduation_year">Graduation Year (if passed)</label>

                            <input id="graduation_year" type="number" class="form-control @error('graduation_year') is-invalid @enderror" name="graduation_year"
                                value="{{ old('graduation_year') }}">

                            @error('graduation_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class='bmd-label-floating' for="password">Password</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                value="{{ old('password') }}">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class='bmd-label-floating' for="password_confirmation">Confirm Password</label>

                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                value="{{ old('password_confirmation') }}">

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" name="terms" id="terms"
                                {{ old('terms') ? 'checked' : '' }}>
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                            <label class="form-check-label" for="terms">
                                I've read all the 
                                <a href="/terms-and-condtions">Terms &amp; Condtions</a>, and I agree to those conditions beofer registering.
                            </label>
                        </div>
                        @error('terms')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    </div>
                    <div class="card-footer px-2">
                        <button type="submit" class="btn btn-success btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection