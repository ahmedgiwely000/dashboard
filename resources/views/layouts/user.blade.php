<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'learn code') }}</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!--===============================================================================================-->
    </head>
    <body class="{{ $class ?? '' }}">


        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth


        {{-- NavBar --}}
        <div class="container-fluid color_navbar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand font-italic font-weight-bold" href="#"><span class="span_logo">LC</span> learn code</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <form method="GET" action="/search" class="form-inline my-2 my-lg-0 form-nav mx-auto">
                        <input class="form-control mx-auto input-search " type="search" name="q" placeholder="Find You Course" aria-label="Search">
                    </form>
                    {{-- dropdown --}}
                  <ul class="navbar-nav ml-auto d-flex mr-5">

                    <li class="nav-item">
                      <a class="nav-link font-weight-bold" href="/home">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link font-weight-bold" href="/allcourses">All Courses</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="/contact">Contact</a>
                    </li>

                    <li class="nav-item dropdown font-weight-bold">
                        <a class="nav-link @auth dropdown-toggle @endauth" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          @auth
                              {{\Str::limit(auth()->user()->name)}}
                          @endauth
                          @guest
                          <li class="nav-item font-weight-bold"><a class="nav-link font-weight-bold" href="{{route('login')}}">login</a></li>
                          @endguest
                        </a>
                        @auth
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">Profile</a>
                            <a class="dropdown-item" href="/mycourses">My Course</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                          </div>
                        @endauth
                      </li>
                  </ul>
                  {{-- end dropdown --}}

                </div>
              </nav>
        </div><!-- Container-fluid -->

        @yield('content')
        @include('includes.footer')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="/js/script.js"></script>

          {{-- <!--===============================================================================================-->
	<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="/vendor/bootstrap/js/popper.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->--}}
        <script src="/vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script> --}}

    <!--===============================================================================================-->
        <script src="/js/main.js"></script>
    </body>
</html>
