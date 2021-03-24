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
    @include('includes.styles')
    </head>
<body class="theme-purple">
<!-- Page Loader -->
@include('includes.loader')
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Chat-launcher -->
<!--<div class="chat-launcher"></div>-->
<!--<div class="chat-wrapper"></div>-->


<!-------------------------------------------------------------->

<!-- Main Content -->
<section class="ecommerce-page">
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
    <div class="col-lg-12">
        <div class="card">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Description</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Review</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about">About</a></li>
            </ul>
        </div>
        <div class="card">
            <div class="body">
                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <p>p1 .</p>
                        <p>p2.</p>
                    </div>
                    <div class="tab-pane" id="review">
                        <p>2-p2</p>
                          <small class="comment-date float-sm-right">Dec 18, 2017</small>
                    </div>
                    <div class="tab-pane" id="about">
                        <h6>3-p3</h6>
                        <p>3-p4.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-------------------------------------------------------------->

@include('includes.footer')
</body>
</html>
