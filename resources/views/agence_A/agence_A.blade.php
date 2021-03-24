<!--doctype html-->
<html class="" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="Stock management template" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('/css/dataTables.min.css')}}"/>

    <!--STYLES
        <title>{{ config('app.name', 'Laravel') }}</title>
    -->
    <title>United Construction</title>
    <!--STYLES-->
    @include('includes.agence_A.styles')
    </head>
<body class="theme-purple" id="body" onload="name()">
<!-- Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
@include('includes.agence_A.topbar')
<!-- Left Sidebar -->
@include('includes.agence_A.navbar')

<!-- Right Sidebar -->
@include('includes.agence_A.right_sidebar')

<!-- Chat-launcher -->
<div class="chat-launcher"></div>
<div class="chat-wrapper"></div>
@yield('content')
@include('includes.agence_A.footer')

@yield('extra-js')
<script src="{{asset('/js/pages/welcome/jquery.min.js')}}"></script>

</body>
</html>
