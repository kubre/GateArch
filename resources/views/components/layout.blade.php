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
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;800&display=swap" rel="stylesheet"> 
    <style>
        html, body, h1, h2, h3, h4, h5, h6, div, p, a {
            font-family: 'Nunito Sans', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-weight: bold;
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

        .grid-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 30px;
        }

        @media screen and (max-width: 991px){
            div#navbarSupportedContent.collapse.show {
            display: block !important;
            box-shadow: -10px 0 20px rgba(0, 0, 0, .16);
            }

            .grid-3 {
                grid-template-columns: 1fr;
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
        <div class="text-uppercase d-flex">
            <div class='px-2 d-flex align-items-center mr-md-5'>
                <span class="material-icons mr-2">watch_later</span>
                <span>Contact us anytime</span>
            </div>
            <div class='px-2 d-flex align-items-center'>
                <span class="material-icons mr-2">send</span>
                <span>contact@gatearch.in</span>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg px-3 px-md-5 mb-0"
        style="background: #f2f2f6 !important; height: 80px; box-shadow: none; border-bottom: 7px solid #ff9900">
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
                    <a class="nav-link" style="font-weight: bold !important" href="{{ route('students.exams') }}">Online Test Series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold !important" href="/contact-us">Contact Us</a>
                </li>
            </ul>
        </div>
        
        @auth('student')
        <div class="dropdown show">
            <a class="btn bg-gate rounded-pill px-4 ml-md-4 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hello {{ explode(" ", auth('student')->user()->name)[0] }}
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('students.dashboard') }}"><i class="material-icons mr-1">dashboard</i> Dashboard</a>
                <a class="dropdown-item" href="{{ route('students.profile') }}"><i class="material-icons mr-1">person</i> Profile</a>
                <div class="dropdown-divider"></div>
                <form method='post' class='w-100 pr-2' action="{{ route('students.logout') }}">
                @csrf
                <button type='submit' class="dropdown-item w-100"><i class="material-icons mr-1">exit_to_app</i> Log out</button>
                </form>
            </div>
        </div>
        @else
        <a class="nav-link btn rounded-pill bg-gate px-4 px-md-5 ml-md-4" href="{{ route('students.login.show') }}">Login</a>
        @endauth
    </nav>

    {{ $slot }}
    
    <footer style="background: #26282c; border-top: 7px solid #ed9800;" class="text-white py-4 container-fluid px-4 px-md-5 ">
       <div class="row">
         <div class="col-md-3 px-md-4 mt-md-0 text-align">
          <img style="max-height: 50px;" src="/images/index/logo-negative.png" alt="logo">
          <p style="font-size: 1.05em; text-align: justify; margin-top: 18px; line-height: 1.3em">We acts as a foundation pillar in a student's preparation strategies which makes their Study hassle free and assists them in staying focused to perform at their fullest potential.</p>
        
        </div>
        <div class="col-md-3 px-md-5 mt-4 mt-md-0 text-align">
          <strong style="font-size: 1.3em">IMPORTANT LINKS</strong>
          <ul class="text-gate-alt mx-auto mt-3" style="font-size: 1.05em">
            {{-- <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/about-us">About</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/contact-us">Contact</a></li> --}}
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/faqs">FAQs</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/blog">Blog</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/shop">Shop</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/terms-and-conditions">Terms &amp; Conditions</a></li>
            <li style="border-bottom: 1px solid #909090; margin-bottom: 10px"><a class="text-white" href="/privacy-policy">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-md-3 text-align mt-4 mt-md-0 mx-auto">
          <strong style="font-size: 1.3em">CONTACT INFO</strong>
          <div class="mt-3">
            <strong><span style="font-size: .9em" class="material-icons">place</span> Location</strong>
            <p style="color: #afafaf">Ground Floor, Plot no 9<br>Shree Swami Vivekanandpuram Society, Osmanpura, <br>Aurangabad, Maharashtra 431005</p>
          </div>
          <div class="mt-3">
            <strong><span style="font-size: .9em" class="material-icons">phone</span> Phone</strong>
            <p style="color: #afafaf">+91-9767720544</p>
          </div>
          <div class="mt-3">
            <strong><span style="font-size: .9em" class="material-icons">send</span> Email</strong>
            <p>
              <a style="text-decoration: none; color: #afafaf" href="mailto:contact@gatearch.in">contact@gatearch.in</a>
            </p>
          </div>
        </div>
        <div class="col-md-3 mt-4 mt-md-0">
          <div class="bg-gate-alt text-center rounded px-4 py-3 h-100">
            <strong style="font-size: 1.3em">CAREER</strong>
            <p style="font-size: 1.05em; margin-top: 10px">We here by welcome all teaching Professionals in Architecture to Join us for various activities like course development, Books content design.</p>
            <a style="font-weight: bold" class="btn bg-white rounded text-gate-alt mt-1" href="/contact-us">Join With Us</a>
          </div>
        </div>
      </div> 
      </footer>

      <footer style="background: #2a2a2a; border-top: 1px solid #676767; font-size: 1.05em;" class="text-white px-3 px-md-5 pt-1 d-flex flex-column flex-md-row justify-content-between align-items-center text-align">
        <p style="color: #afafaf" class="mb-0">&copy; {{ date('Y') }}, All rights reserved by Cognimize LLP</p>
        <div class="mt-3 mt-md-0">
          <a target="_blank" class="mr-3" href="https://www.instagram.com/gatearch2021/"><img height="28" src="data:image/png;base64,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" alt="insta link"></a>
          <a target="_blank" class="mr-3" href="https://www.facebook.com/Gate-Arch-102490608210254"><img height="28" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAABhklEQVRYhe3XMUvDQBQH8FfBQYUihSSXUqFgJ0EQnPwWzuriIjp26XstCkUXQRDp5uQXMN39BuLuIi46GqHNvaukOJxDjRQNtvYSC6UHb7vc/5e83PAAAMCisOQQNwWy76DUaZZA9h3ipkVhCaJwgVKlHfwTIpVFYQkc4uZ/h0flInuQymcnfhfELwI5HNQOSDC4na8FxwXsroLWMwAAADqTa+js0mF7WVTUadxziQAE8X2x3irCL8umzn5agPag8HQB1eBkUHiqAFHtrsQm7ulZ++htI49qy8ZgxyZ5lThAkOoA6Mz3bOdMLwiSd8OcYQaoBM9xLy+wczDsGaYteIwDOCTPxwxQFxMLeBAkb6Nyia/jAG4tKPfv+6xXY4BdlZuxV26I5ZC6GStAoHoaG2D9Us8n8g+MCrBqai0ZAKntYr21GFWuobNxgYWynuvfl6+o3Ym5hlPAFDAFJA8wHEyMAL3BxGw0MwK4yJ7pcDoy4Gs4BehNyC6yN0I7/gwQyL6L7EXhH5TqA6SjSa0SAAAAAElFTkSuQmCC" alt="fb link"></a>
          <a target="_blank" class="mr-3" href="https://wa.me/message/EZ2REWDB322HP1"><img height="28" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAFOUlEQVRYhb3X2U9UVxzA8ZP4txSM1VgjdonGtBVRB5EqTgVRQQW3UkHUlgqjEEUlMREh1dpaa2t8KFVj1abFFK1ao9EubAMoIrLJwCzMwGx37vLtA+EK986gSaMn+bz8tnNncuZkrhDj1oZIaUKWWly9Xt5rz1ZLPNlKCf+bapOyVdtAtmZrzlKLq7MittnCuKxYp6yTbYeylGJ1nbyHVylLKVazZVu5FesU/QEypT0H10hFvE6Z0p6DQggh0iPFCZlSkbo6/DmvU6ZUpKZHihNEenBXdUZoNy9rbaiIw9IpzsvXqFPucVepp1a5wzn5KkXS0ZeekxHaTUZwd5VID+xsXhXYyYvkBPfyi3yLoBZisjWguflaqiEjsPuFM9MDO5uF1V84YPXvYDLHwmf1jWUU6pU2vpcucST8HWWh41SGz3I+UssTtVd/kG61n/zgoUnnWv2FbrFypEBKG84nlp+k3wDQ0Pg9cpfckb0xa9OG8ykOVPJQ6QQgoIUoDXw5ab1Y7ttOLCdDNQCEtDCHA9/ErDNK8xVwRfpDf4hPR8pj1orUoTyiKRyuQEFFQcU2UhW15kUuh68D0KsOkDaUH7VGpHi2EU293AbAmeAlPbbZW8qPoV/J8x2I2mOU6smjRe4A4GSgJmqNSHZtwajQWwGAQ3WS6soj2bWFNHc+btULwD+RFlNPLDu8hwHwqD6Wuraa8sLi3ITR+WAtAKf9F/SYzXdMP+EaGjmeElNfLC2RxwDs8laYcmLxYC5GT+QeAHLde/VYhe/UhN/7Ad9Xpr5YTvsvAHAucMWUE0mOjRgFtCAyCoscOXps1WAhGhoA/0qtLHbkmvpisQ2NfnvXgndMOZHYv57xLI5NADgVD8bc7dBfAHTKvSQ7NpvysWx1lQHwINxkyokP+7IwCmsSYU1iQV/2hPjK/u24lCEAbgTvmfpi2eE8BMDN4H1TTrzfuxajzsjolWrtzzfltg6WEtFkAP4M/a3XbBncR6vUwZGhb0nsWz+hp9xzAoALI7WmeWJ+dyZGt4IPAChxVppy87szKRgsx68GAQhqIc76fsapePQD6pCdJPZk6/W1/tujB9d9wjRLzOtajVGJs3L09x5qMeXGrHv2Gc3hdqItvxrQ6xb1bGREDaCiYunZZJoj5j5Nx2j+00z9E2149oUpP2be0wz2O4/TFH6kb+5WvBQOHNRrzngvAnA9cDfqDPHek4+J5srw6D1+1HUmat5oSVcOa3t3Mb8zU4/l9pUQ0SLImoK1Z3vUPvFOx0qi6ZC6AUjvKYiaf5HVPYW4ldGru9r9Q8w6Mad9BUaWzhwABmSXHlvZlceKp9tMtUZvt6exz3GMgDr6B+bq8I1J68XsR8sxKnNUA/Aw3MllXx0O2QmAisZN/30+6S1jbnv6hJ4FHVmUOappCT/Wz8MZz0XmPFphmv/cCknMakv1zGpLZbza4dumk90l9eFXAxNibsVLe7gLt+LVr2mADqmb7T37Mc41eZTqEG+1LrPPbE1hzKzWZXiVYQZkF5e9dZQ8O0pS+3pmtqbw7kMrtmeV3PPXMyi79U1VNByyk8veOgp6y5nVmsr4mZNoEjPsS6tn2JMZk9CynJT2zYyPxTK75SM+eLiGmfaUl6qPokpMb1uWMN1uUac3L+G1slvUGY3Jo++Jb9oth6Y1Lea1sieXP387rbFOmdq0pHxq4yJ1akMSr1TjInVaQ9JBUTPu5XRsxTdZEuIaE6veaFjYFNeQ6IhvWCjF1Sfyf8U3LHTH1Sc1xzUmVsU3WRLG7/kfG9TdFNNTtMYAAAAASUVORK5CYII=" alt="whatsapp link"></a>
          <a target="_blank" href="https://www.youtube.com/channel/UCeOJjFcN-slEdwbRGimEaZA/?guided_help_flow=5"><img height="32" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAB2UlEQVRYhe2Wv2sUQRTHB9KGpEpxcJc3u/OdZQdykOQqG7nGdBaCgZD/QdFG0SKptVH0r7j69J/I2RlrrSIHO7O7t242YuKziFHUItkfZAvvC68cvh9m3nvzFWKuuS4RC7HgfH85N4NOHK7LtKsQkTau6/cTmM0EZtN1/X5E2qRdhThcl7kZdJzvL7MQC1c2skr14lXsOw8jS5hYiWkk9YklcJ2KpD6xElNLmDgPo3gV+1ap3h/mCbBlSWd1za5eOkuArfMrXhkuOtL2+szPy5G2vDJcFI7C3es2/w0R7gpH6nlbAJGvnomI9Lg1ANJjERPelTmUDG/xl8dP2XpBExAT4SQ+lTmU3r7DzMynhx843d6p1wNSfRROIq4CcKGv47cc37hZDYDghCUc1wFgZv5eFHz88jW7sF8WIheOcFYX4EJnR585u/+wzA2cNgxwxNm9B+UAGnuCF68qPkHtJnxTrwmrjuG394ec3m1gDCstokdPmltEra/i1j+j1r/j1gNJK5FM6tmvSPZXKN1zHkbWCw6sxNRKFPXNUFiJqfWCg5+hdO+fUHpZLGdgKTeDTmEMJT2oWRCEmTJrMWEjJmxkyqzNgiBMelCFMZSbQYeBpVKxfK7/Vj8AttFEE4FSoCYAAAAASUVORK5CYII=" alt="youtube link"></a>
        </div>
        <a target="_blank" style="color: #afafaf" class="my-3" href="https://kubre.in">Developed by Kubre for Cognimize</a>
      </footer>
      
    <script src="{{ asset('js/app.js') }}"></script>
    {{ $scripts ?? '' }}
</body>

</html