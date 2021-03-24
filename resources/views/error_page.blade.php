<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta content="Stock management template" name="description">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--STYLES
            <title>{{ config('app.name', 'Laravel') }}</title>
        -->
        <!--STYLES-->
            @include('includes.styles')

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>United Construction</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style type="text/css">
            .error_form{display:block;color:red}
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 54px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body class="theme-purple">

        <!-- Page Loader -->

<!-- Overlay For Sidebars -->
    <div class="overlay"></div>

<!-- Chat-launcher -->
    <div class="chat-launcher"></div>
    <div class="chat-wrapper"></div>

<!-- Main Content -->
    <div class="section-login block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index-2.html"><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="ecommerce-page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="tab-content">
                    <section class="error-page">
                        <div class="center">
                            <div class="block text-center">
                                <h1 class="block text-center title">404</h1>
                                <h3>Page Not Found</h3>
                                <p>The link you clicked may be broken or the
                                    <br>page may have been removed.</p>
                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                <a href="index.html" class="btn btn-primary btn-lg btn-block">Back homepage</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>

        <div class="flex-center position-ref full-height">
            <!--@if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            -->
        </div>

        @include('includes.footer')
    </body>
</html>
