<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('css/color_skins.css')}}">
</head>
<body class="theme-purple authentication sidebar-collapse">
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
            <div class="container">
                <div class="navbar-translate n_logo">
                    <a class="navbar-brand" href="javascript:void(0);" title="" target="_blank">{{ config('app.name', 'Laravel') }}</a>
                    <button class="navbar-toggler" type="button">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" title="Follow us on Twitter" href="javascript:void(0);" target="_blank">
                                <i class="zmdi zmdi-twitter"></i>
                                <p class="d-lg-none d-xl-none">Twitter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" title="Like us on Facebook" href="javascript:void(0);" target="_blank">
                                <i class="zmdi zmdi-facebook"></i>
                                <p class="d-lg-none d-xl-none">Facebook</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" title="Follow us on Instagram" href="javascript:void(0);" target="_blank">
                                <i class="zmdi zmdi-instagram"></i>
                                <p class="d-lg-none d-xl-none">Instagram</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if(Route::currentRouteName() == 'login')
                            <a class="nav-link btn btn-white btn-round" href="{{route('register')}}">SIGN UP</a>
                                @else
                                <a class="nav-link btn btn-white btn-round" href="{{route('login')}}">SIGN IN</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            @yield('content')

    <script src="{{asset('bundles/libscripts.bundle.js')}}"></script>
    <script src="{{asset('bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

    <script>
        $(".navbar-toggler").on('click',function() {
            $("html").toggleClass("nav-open");
        });
        //=============================================================================
        $('.form-control').on("focus", function() {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function() {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });
    </script>
</body>
</html>
