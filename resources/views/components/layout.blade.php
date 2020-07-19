<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name='viewport'
        content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="vaibhav kubre">
    <meta name="keywords" content="gatearch, gate, jee, exams, kubre, vaibhav kubre, gatearch.in, cognimize, indian exams">
    <title>@if(! empty($__env->yieldContent('title'))) @yield('title') -
        @endif{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;800&display=swap" rel="stylesheet"> 
    <style>
        html, body, h1, h2, h3, h4, h5, h6, div, p, a {
            font-family: 'Nunito', sans-serif;
        }
        .text-align {
            text-align: left;
        }
        .header {
            min-height: calc(80vh - 140px);
            background-image: url('/images/index/bg.png');
            background-size: cover
        }

        .header img {
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            0% {
            transform: translateX(-500px);
            }

            100% {
            transform: translateX(0px);
            }
        }

        @media screen and (max-width: 991px){
            div#navbarSupportedContent.collapse.show {
            display: block !important;
            box-shadow: -10px 0 20px rgba(0, 0, 0, .16);
            }

            .text-align {
            text-align: center;
            }

            .header {
            min-height: 550px;
            }

            .navbar-toggler {
                position: absolute;
                left: 10px;
            }

            .navbar a.navbar-brand {
                margin-left: 50px;
            }
        }

        .bg-gate {
            color: #fff !important;
            background: #388087 !important;
        }

        .text-gate {
            color: #388087
        }


        .text-gate-alt {
            color: #ff9900 !important;
        }

        .bg-gate-alt {
            color: #fff !important;
            background: #ff9900 !important;
        }
    </style>
    {{ $header ?? '' }}
</head>

<body>
    <section style="font-size: .8em" class="bg-dark text-white d-flex flex-column flex-md-row justify-conten-between align-items-center px-md-5 py-3 text-sm">
        <div class="text-uppercase d-none d-md-flex">
            <div class='px-2 d-flex align-items-center mr-md-5'>
                <span class="material-icons mr-2">watch_later</span>
                <span>Contact us anytime</span>
            </div>
            <div class='px-2 d-flex align-items-center'>
                <span class="material-icons mr-2">send</span>
                <span>contact@gatearch.in</span>
            </div>
        </div>
        <div class="mx-auto mr-md-3">
          <a class="mr-3" href="https://www.instagram.com/gatearch2021/"><img height="32" src="/images/index/insta.png" alt="insta link"></a>
          <a class="mr-3" href="https://www.facebook.com/Gate-Arch-102490608210254"><img style="filter: invert(1)" height="32" src="/images/index/fb.png" alt="fb link"></a>
          <a class="mr-3" href="https://wa.me/message/EZ2REWDB322HP1"><img height="32" src="/images/index/wa.png" alt="whatsapp link"></a>
          <a href="https://www.youtube.com/channel/UCeOJjFcN-slEdwbRGimEaZA/?guided_help_flow=5"><img height="32" src="/images/index/yt.png" alt="youtube link"></a>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg px-3 px-md-5 mb-0"
        style="background: #f2f2f6 !important; height: 80px; box-shadow: none">
        <a class="navbar-brand" style="height: 100%" href="/">
            <img src="/images/index/logo.png" style="height: 100%" alt="logo">
        </a>
        <button class="navbar-toggler" style="z-index: 9999" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span><i class="material-icons">menu</i></span>
        </button>

        <div style="z-index: 9999" class="navbar-collapse collapse text-uppercase pt-5 pt-md-0 px-3 px-md-0 text-gate"
            style="font-size: 1.1em; transition: all 400ms;" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" style="font-weight: bold !important" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold !important" href="/about-us">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold !important" href="/gatearch">Gate Architecture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold !important" href="{{ route('students.register.show') }}">Online Test Series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold !important" href="/contact-us">Contact Us</a>
                </li>
            </ul>
        </div>
        <a class="nav-link btn rounded-pill bg-gate px-4 px-md-5 ml-md-4" href="{{ route('students.login.show') }}">Login</a>
    </nav>
    {{ $slot }}
    <script src="{{ asset('js/app.js') }}"></script>
          <footer style="background: #26282c;" class="text-white py-5 container-fluid px-4 px-md-5 ">
       <div class="row">
         <div class="col-md-3 px-md-4 text-align">
          <img style="max-width: 80%" src="/images/index/logo-negative.png" alt="logo">
          <p style="font-weight: bold; font-size: 1.3em; text-align: justify; margin-top: 18px; line-height: 1.5em">We acts as a foundation pillar in a student's preparation strategies which makes their Study hassle free and assists them in staying focused to perform at their fullest potential.</p>
        </div>
        <div class="col-md-3 px-md-5" style="font-size: 1.3em">
          <h3 style="font-weight: 1.5em; font-weight: bold">Important Links</h3>
          <ul class="text-gate-alt mx-auto mt-3">
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/about-us">About</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/contact-us">Contact</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/faqs">FAQs</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/blog">Blog</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/shop">Shop</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/terms-and-conditions">Terms &amp; Conditions</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/privacy-policy">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-md-3 px-4 text-align mt-4 mt-md-0 mx-auto" style="font-size: 1.3em; font-weight: bold">
          <h3 style="font-size: 1.5em; font-weight: bold">Contact Info</h3>
          <div class="mt-3">
            <h4 style="font-weight: bold"><span style="font-size: .9em" class="material-icons">place</span> Location</h4>
            <p style="color: #afafaf">Cognimize<br/>Kolsewadi, Auranagbad<br/>(MH) - 431001</p>
          </div>
          <div class="mt-3">
            <h4 style="font-weight: bold"><span style="font-size: .9em" class="material-icons">phone</span> Phone</h4>
            <p style="color: #afafaf">+91-9767720544</p>
          </div>
          <div class="mt-3">
            <h4 style="font-weight: bold"><span style="font-size: .9em" class="material-icons">send</span> Email</h4>
            <p>
              <a style="text-decoration: none; color: #afafaf" href="mailto:contact@gatearch.in">contact@gatearch.in</a>
            </p>
          </div>
        </div>
        <div style="font-size: 1.3em; font-weight: bold" class="col-md-3 mt-4 mt-md-0">
          <div class="bg-gate-alt text-center rounded px-4 py-5 h-100">
            <h4 style="font-weight: bold; font-size: 1.5em">CAREER</h4>
            <p>We here by welcome all teaching Professionals in Architecture to Join us for various activities like course development, Books content design.</p>
            <a style="font-weight: bold" class="btn bg-white rounded text-gate-alt mt-2" href="/contact-us">Join With Us</a>
          </div>
        </div>
      </div> 
      </footer>

      <footer style="background: #2a2a2a; border-top: 1px solid #676767; font-size: 1.2em; font-weight: bold" class="text-white py-3 py-md-2 px-3 px-md-5 d-flex flex-column flex-md-row justify-content-between align-items-center text-align">
        <p style="color: #afafaf" class="mb-0">&copy; {{ date('Y') }}, All rights reserved by Cognimize LLP</p>
        <div class="mt-4 mt-md-0">
          <a class="mr-3" href="https://www.instagram.com/gatearch2021/"><img height="32" src="/images/index/insta.png" alt="insta link"></a>
          <a class="mr-3" href="https://www.facebook.com/Gate-Arch-102490608210254"><img style="filter: invert(1)" height="32" src="/images/index/fb.png" alt="fb link"></a>
          <a class="mr-3" href="https://wa.me/message/EZ2REWDB322HP1"><img height="32" src="/images/index/wa.png" alt="whatsapp link"></a>
          <a href="https://www.youtube.com/channel/UCeOJjFcN-slEdwbRGimEaZA/?guided_help_flow=5"><img height="32" src="/images/index/yt.png" alt="youtube link"></a>
        </div>
        <a style="color: #afafaf" class="my-3" href="https://kubre.in">Developed by Kubre for Cognimize</a>
      </footer>
    {{ $scripts ?? '' }}
</body>

</html