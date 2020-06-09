<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name='viewport'
        content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if(! empty($__env->yieldContent('title'))) @yield('title') -
        @endif{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('header')
</head>

<body>
    <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo text-center" style='font-weight: bold'>Student Panel</div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Route::is('students.dashboard') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('students.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Route::is('students.profile') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('students.profile') }}">
              <i class="material-icons">person</i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item {{ Route::is('students.exams') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('students.exams') }}">
              <i class="material-icons">content_paste</i>
              <p>Exams</p>
            </a>
          </li>
          <li class="nav-item {{ Route::is('students.results') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('students.results') }}">
              <i class="material-icons">library_books</i>
              <p>Results</p>
            </a>
          </li>
          <li class="nav-item">
            <form method='post' id='logoutForm' action="{{ route('students.logout') }}">
            @csrf
            </form>
            <a class="nav-link" href='#' onclick="document.getElementById('logoutForm').submit()">
              <i class="material-icons">exit_to_app</i>
              <p>Log Out</p>
            </a>
          </li>
          {{-- <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.html">
              <i class="material-icons">unarchive</i>
              <p>Upgrade to PRO</p>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">@yield('page-title')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">0</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div> --}}
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{ route('students.profile') }}"><i class="material-icons">person</i>Profile</a>
                  <a class="dropdown-item" href="#"><i class="material-icons">settings</i>Settings</a>
                  <div class="dropdown-divider"></div>
                  <form method='post' class='w-100 pr-2' action="{{ route('students.logout') }}">
                    @csrf
                    <button type='submit' class="dropdown-item w-100"><i class="material-icons">exit_to_app</i>Log out</button>
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        @yield('content')
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="#">
                  Contact Us
                </a>
              </li>
              <li>
                <a href="#">
                  Privacy Policy
                </a>
              </li>
              <li>
                <a href="#">
                  Terms &amp; Condition
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script> GRID Associates | Designed &amp; Developed <a target='_blank' href='https://kubre.in'>Kubre</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  {{-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown py-3">
      <a class="text-white" href="#" data-toggle="dropdown">
        <i class="material-icons" style="font-size: 2em; line-height: 20px;">settings</i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title">Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure active" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose" data-color="rose"></span>
            </div>
          </a>
        </li>
        <li class="header-title">Options</li>
        <li class="adjustments-line">WIP</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li> 
      </ul>
    </div>
  </div> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>