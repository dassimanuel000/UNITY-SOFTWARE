@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>L'employe {{ $voir_employe->nameEmp}} - {{ $voir_employe->prenomEmp}}
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Salari&eacute;s</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- profile -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- card profile -->
                                <!-- ============================================================== -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="user-avatar text-center d-block">
                                            <img src="{{asset('uploads/employe/'. $voir_employe->image) }}" alt="voir_employe" class="img-fluid" />
                                        </div>
                                        <div class="text-center">
                                            <h2 class="font-24 mb-0">{{ $voir_employe->nameEmp}} , {{ $voir_employe->prenomEmp}}</h2>
                                            <p>{{ $voir_employe->posteEmp}}, @ {{ $voir_employe->typeEmp}}</p>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <h2 class="font-18">Contact Information</h2>
                                        <br/>
                                        <div class="border-right">
                                            <ul class="list-unstyled mb-2">
                                            <li class="mb-2"><i class="zmdi zmdi-email"></i><i class="fas fa-fw fa-envelope mr-2"></i>{{ $voir_employe->emailEmp}}</li>
                                            <li class="mb-0"><i class="zmdi zmdi-phone"></i><i class="fas fa-fw fa-phone mr-2"></i>{{ $voir_employe->telEmp}}</li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <h3 class="font-16">Performance</h3>
                                        <h1 class="mb-0">4.8</h1>
                                        <div class="rating-star">
                                            <i style="color: gold" class="zmdi zmdi-star"></i>
                                            <i style="color: gold" class="zmdi zmdi-star"></i>
                                            <i style="color: gold" class="zmdi zmdi-star"></i>
                                            <i style="color: gold" class="zmdi zmdi-star"></i>
                                            <i style="color: gold" class="zmdi zmdi-star"></i>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <h3 class="font-16">Social Channels</h3>
                                        <div class="">
                                            <ul class="mb-0 list-unstyled">
                                            <li>te</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <h3 class="font-16">Category</h3>
                                        <div>
                                            <a href="#" class="badge badge-light mr-1">{{ $voir_employe->typeEmp}}</a>
                                            <a href="#" class="badge badge-light mr-1">{{ $voir_employe->posteEmp}}</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end card profile -->
                                <!-- ============================================================== -->
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- campaign tab one -->
                                <!-- ============================================================== -->
                                <div class="section-block">
                                    <h3 class="section-title"><br></h3>
                                </div>
                                <div class="row">
                                    <div class="details col-lg-8 col-md-12">
                                        <h3> Matricule : {{ $voir_employe->matricule}}</h3>
                                        <h3 class="product-title m-b-0">{{ $voir_employe->nameEmp}} {{ $voir_employe->prenomEmp}}</h3>
                                        <h4 class="price m-t-0">Salaire de Base: <span class="col-amber">${{ $voir_employe->salaireBaseEmp}}</span></h4>
                                        <div class="rating">
                                            <div class="stars">
                                                @php
                                                    $vor = $voir_employe->salaireBaseEmp / 10000;
                                                    for ($i=0; $i < $vor; $i++) {
                                                        echo '<span class="zmdi zmdi-star col-amber"></span>';
                                                    }
                                                @endphp
                                                <span class="zmdi zmdi-star-outline"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><br><br>
                                <div class="influence-profile-content pills-regular">
                                    <ul class=" nav nav-nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true"><i class="zmdi zmdi-star"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false"><i class="zmdi zmdi-home"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false"><i class="zmdi zmdi-calendar"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false"><i class="zmdi zmdi-forward"></i></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2><strong>Age</strong> </h2>
                                                            <button class="btn btn-primary width-8 dashboard">{{ $voir_employe->ageEmp}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2><strong>Situation</strong> Matrimoniale</h2>
                                                            <button class="btn btn-primary width-8 dashboard">{{ $voir_employe->statutEmp}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2><strong>Adresse</strong> </h2>
                                                            <button class="btn btn-primary width-8 dashboard">{{ $voir_employe->adresseEmp}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2 style="color: gold; !important"><strong>Agence : </strong> </h2>
                                                            <button class="btn btn-primary bg-blue width-8 dashboard">{{ $voir_employe->agenceEmp}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2 style="color: gold; !important"><strong>Poste : </strong> </h2>
                                                            <button class="btn btn-primary bg-blue width-8 dashboard">{{ $voir_employe->posteEmp}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2 style="color: gold; !important"><strong>Type D'emploi : </strong> </h2>
                                                            <button class="btn btn-primary bg-blue width-8 dashboard">{{ $voir_employe->typeEmp}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    use Carbon\Carbon;
                                                @endphp
                                                <button class="btn-hover color-9 button-dashboard">Date d'embauche : {{ Carbon::parse($voir_employe->created_at)->diffforHumans()}}</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="section-block">
                                                        <h4 class="section-title">Les Comp&eacute;tences</h4>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                    <div class="card">
                                                        <div class="card-header bg-primary text-center p-3 ">
                                                            <h4 class="mb-0 text-white"> Note</h4>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <h1 class="mb-1">$150</h1>
                                                            <p>Per Month Plateform</p>
                                                        </div>
                                                        <div class="card-body border-top">
                                                            <a href="#" class="btn btn-outline-secondary btn-block btn-lg">Derniere Note : </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                    <div class="card">
                                                        <div class="card-header bg-info text-center p-3">
                                                            <h4 class="mb-0 text-white"> Standard</h4>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <h1 class="mb-1">$350</h1>
                                                            <p>Per Month Plateform</p>
                                                        </div>
                                                        <div class="card-body border-top">
                                                            <button class="btn btn-secondary btn-block btn-lg">Note : </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                    <div class="card">
                                                        <div class="card-header bg-success text-center p-3">
                                                            <h4 class="mb-0 text-white">Premium</h4>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <h1 class="mb-1">$550</h1>
                                                            <p>Per Month Plateform</p>
                                                        </div>
                                                        <div class="card-body border-top">
                                                            <button class="btn btn-secondary btn-block btn-lg">Note : </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                            <div class="card">
                                                <h5 class="card-header">Les Rapports</h5>
                                                <div class="card-body border-top">
                                                    <div class="review-block">
                                                        <i class="zmdi zmdi-email pb-4"></i>
                                                        <p class="review-text font-italic m-0">“Integer pretium laoreet mi ultrices tincidunt. Suspendisse eget risus nec sapien malesuada ullamcorper eu ac sapien. Maecenas nulla orci, varius ac tincidunt non, ornare a sem. Aliquam sed massa volutpat, aliquet nibh sit amet, tincidunt ex. Donec interdum pharetra dignissim.”</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                                            <div class="card">
                                                <h5 class="card-header">Send Messages</h5>
                                                <div class="card-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                                <div class="form-group">
                                                                    <label for="name">Your Name</label>
                                                                    <input type="text" class="form-control form-control-lg" id="name" placeholder="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Your Email</label>
                                                                    <input type="email" class="form-control form-control-lg" id="email" placeholder="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subject">Subject</label>
                                                                    <input type="text" class="form-control form-control-lg" id="subject" placeholder="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="messages">Messgaes</label>
                                                                    <textarea class="form-control" id="messages" rows="3"></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary float-right">Send Message</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- ============================================================== -->
                                    <!-- end campaign tab one -->
                                    <!-- ============================================================== -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section-2 ftco-degree-bg">
            <div class="body">

                <a href="/list_employe">
                    <button class="btn-hover btn waves color-9 button-dashboard">Back</button>
                </a>
            </div>
        </section>
    </div>
</section>
@endsection
