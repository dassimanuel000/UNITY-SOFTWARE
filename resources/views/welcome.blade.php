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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Login</div>
                                        <div class="panel-body">

                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                                {!! csrf_field() !!}

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">E-Mail Address</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                        <span class="error_form" id="email_error_message"></span>

                                                        <span class="error_form" id="email_invalide_error_message"></span>

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Password</label>

                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control" name="password">

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="remember"> Remember Me
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-btn fa-sign-in"></i>Login
                                                        </button>

                                                        <a class="btn btn-link" href="{{ url('/register') }}">register ?</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <small class="comment-date float-sm-right">Dec 18, 2017</small>
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
            <div class="content">
                <div class="title m-b-md">
                    United Construction
                </div>
                <div class="links">
                    <a href="mailto:dassimanuel000@gmail.com">Demander de l'aide</a>
                </div>
            </div>
        </div>

        @include('includes.footer')
    </body>
</html>
