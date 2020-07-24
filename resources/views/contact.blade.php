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
    <div style="color: #dfdfdf;" class="col-md-3 bg-dark d-flex flex-column align-items-center justify-content-between px-4 py-2 py-md-5 hidden-md-down">
        <img src="/images/index/logo-negative-v.png" class="d-none d-md-inline-block" style="max-width: 100px;">
        <div class="text-center">
            <h3>Contact Us</h3>
            <hr style="width: 80px; background: #ff9900">
            <p>We would love to hear from you. Let us know if you are facing any problems, have any questions or want to share feedback. We are always happy to help!</p>
        </div>
        <div></div>
    </div>

    <div class="col-md-5 bg-white px-5-lg px-2-md d-flex align-items-center justify-content-center" style="box-shadow: 10px 1px 32px 2px rgba(0,0,0,0.16); overflow-y: auto">
        <form class='w-100' method="POST" action="/contact-us">
            <div style='max-width: 650px;' class="p-5 mx-auto">
                @csrf
                @isset($success)
                <div class="text-success">{{ $success }}</div>
                @endisset
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="name">Your Name</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="email">Email</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="subject">Subject</label>

                        <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                            name="subject" value="{{ old('subject') }}">

                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class='bmd-label-floating' for="lastname">Message</label>

                        <textarea rows="3" wrap="hard" id="message" type="message" class="form-control @error('message') is-invalid @enderror"
                            name="message">{{ old('message') }}</textarea>

                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group mt-3">
                    <button type="submit" style='background: #343a40' class="btn btn-light btn-block">
                        Send
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1326.710464624383!2d75.32655641137228!3d19.86093484663464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDUxJzM5LjYiTiA3NcKwMTknMzcuMCJF!5e0!3m2!1sen!2sin!4v1595610533721!5m2!1sen!2sin" frameborder="0" style="border:0;width: 100%; height: 100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>  
    </div>
</div>

</x-layout>