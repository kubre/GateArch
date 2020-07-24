<x-layout>

    <x-slot name="header">
        <style>
            html, body {
                height: 100%;
                width: 100%;
                overflow-x: hidden;
            }
        </style>
    </x-slot>

<div class="row align-items-stretch">
    <div style="color: #dfdfdf;" class="col-md-3 bg-dark d-flex flex-column align-items-center justify-content-between px-4 pt-2 pb-3 py-md-5 hidden-md-down">
        <img src="/images/index/logo-negative-v.png" class="d-none d-md-inline-block" style="max-width: 100px;">
        <div class="text-center">
            <h3>Register</h3>
            <hr style="width: 80px;background: #ff9900">
            <p>Already have an account? <a class="text-info" href="{{ route('students.login.show') }}">Sign In</a></p>
        </div>
        <a style="color: #1188aa;" href="/terms-and-conditions">Terms &amp; Conditions</a>
    </div>
    <div class="col bg-white px-5-lg px-2-md d-flex align-items-center justify-content-center" style="box-shadow: 10px 1px 32px 2px rgba(0,0,0,0.16); overflow-y: auto">
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

                        <input id="mobile" pattern="\d{10}" maxlength="10" minlength="10" class="form-control @error('mobile') is-invalid @enderror"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        name="mobile" value="{{ old('mobile') }}">

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <p class="text-muted">You will recieve an OTP on this number for verification.</p>
                </div>
                <div class="form-group mt-3">
                    <button onclick='next()' type="button" style='background: #343a40' class="btn btn-light btn-block">
                        Next
                    </button>
                </div>
                </div>

                
                <div id='second' style="display: none;">
                <h3>Other Details</h3>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="dob">Date of Birth</label>

                        <input id="dob" type="date" onkeydown="return false" class="form-control @error('dob') is-invalid @enderror"
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
                    <div class="form-group col">
                        <label class="bmd-label-floating pl-3">  Graduation Details</label>
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

                    <div class="form-group col" style="display: none">
                        <label class='bmd-label-floating' for="graduation_year">Graduation Year (if passed)</label>

                        <select class="form-control @error('graduation_year') is-invalid @enderror" name="graduation_year" id="graduation_year">
                            @for ($i = date('Y'); $i > date('Y') - 20; $i--)
                                <option @if(old('graduation_year') == $i) selected @endif value="{{ $i }}">
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
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            value="{{ old('password') }}">

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
                        <a class='text-info' target="_blank" href="/terms-and-conditions">Terms &amp; Condtions</a>, and I agree to those conditions
                        beofer registering.
                    </label>
                    @error('terms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3 row">
                    <div class="col-md-4">
                        <button  onclick='btnBack()' type="button" style='border: 1px solid #343a40' class="btn btn-dark btn-block">
                            Back
                        </button>
                    </div>
                    <div class="col">
                        <button id="submit" disabled type="submit" style='background: #343a40' class="btn btn-light btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3">
    </div>
</div>

    <x-slot name="scripts">
    <script>
        $(function() {
            checkStatus()
            $("#graduation_status").change(checkStatus);
        });

        function checkStatus() {
             $('#graduation_status').val() == 'passed' ? $('#graduation_year').parent().show() : $('#graduation_year').parent().hide()
        }

        $('#second input, #second select, #terms').change(function() {
            var canSubmit = true;
            $('#dob, #college_name, #graduation_status, #password, #password_confirmation').each(function(i, e) {
                if ($(e).val().trim().length < 1) canSubmit = false;
            });

            if ($('#graduation_status').val() == 'passed' && $('#graduation_year').val().trim().length != 4) canSubmit = false;

            if (!$("#terms").is(':checked')) canSubmit = false;

            if ($("#password").val() != $("#password_confirmation").val()) canSubmit = false;

            if (canSubmit) $("#submit").removeAttr('disabled');
            else $("#submit").attr('disabled', true);
        })

        $(document).keypress(function (event) {
            if (event.which == '13') event.preventDefault();
        });
        function next() {
            var validated = true;
            $("#first input").each(function(i, inp) {
                if ($(inp).val().trim().length < 1) {
                    validated = false;
                    $(inp).addClass('is-invalid');
                } else {
                    $(inp).addClass('is-valid');
                }
            });
            if (!validated) return;
            $("#first").slideUp();
            $("#second").slideDown();
        }

        function btnBack() {
            $("#second").slideUp();
            $("#first").slideDown();
        }
    </script>
    </x-slot>
</x-layout>