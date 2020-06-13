<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'learn code') }}</title>
        <script src="{{ asset('js/app.js') }}"></script>
        <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        {{-- NavBar --}}
        <div class="container-fluid color_navbar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand font-italic font-weight-bold" href="#"><span class="span_logo">LC</span> learn code</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <form class="form-inline my-2 my-lg-0 form-nav mx-auto">
                        <input class="form-control mx-auto input-search " type="search" placeholder="Find You Course" aria-label="Search">
                    </form>

                  <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item">
                      <a class="nav-link font-weight-bold" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown font-weight-bold">
                        <a class="nav-link @auth dropdown-toggle @endauth" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          @auth
                              {{\Str::limit(auth()->user()->name)}}
                          @endauth
                          @guest
                              login
                          @endguest
                        </a>
                        @auth
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin/profile">Profile</a>
                            <a class="dropdown-item" href="">My Course</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                          </div>
                        @endauth
                      </li>
                  </ul>
                </div>
              </nav>
        </div><!-- Container-fluid -->
        @yield('content')

        <script src="/js/script.js"></script>
    </body>
</html>
