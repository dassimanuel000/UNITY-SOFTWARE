<!doctype html>
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
    <title>United Construction</title>
    <!--STYLES-->
    @include('includes.Chef_agence_B.styles')
    </head>
<body class="theme-purple">
<!-- Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
@include('includes.Chef_agence_B.topbar')
<!-- Left Sidebar -->
@include('includes.Chef_agence_B.navbar')

<!-- Right Sidebar -->
@include('includes.Chef_agence_B.right_sidebar')

<!-- Chat-launcher -->
<div class="chat-launcher"></div>
<div class="chat-wrapper"></div>
@yield('content')
@include('includes.Chef_agence_B.footer')
</body>
</html>
