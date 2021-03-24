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
    @include('includes.Magasin_agence_A.styles')
    </head>
<body class="theme-purple">
<!-- Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
@include('includes.Magasin_agence_A.topbar')
<!-- Left Sidebar -->
@include('includes.Magasin_agence_A.navbar')

<!-- Right Sidebar -->
@include('includes.Magasin_agence_A.right_sidebar')

<!-- Chat-launcher -->
<div class="chat-launcher"></div>
<div class="chat-wrapper"></div>
@yield('content')
@include('includes.Magasin_agence_A.footer')
</body>
</html>
