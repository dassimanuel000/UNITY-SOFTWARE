@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Primes
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Primes</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 ">
                <div class="card product_item_list">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="panel-body center">
                                <img src="{{asset('uploads/employe/'.$idEmp->image)}}" class="img-circle center m-b img-responsive shadow" width="140" height="140" alt="User" style="border-radius: 100%;margin-left:35%;"/>
                                <h3 class="text-center center">{{ $idEmp->nameEmp }},{{ $idEmp->prenomEmp }}</h3>
                                <p class="all-pro-ad text-center center">{{ $idEmp->adresseEmp}},{{ $idEmp->telEmp }}</p>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card product_item_list">
                    <div class="body table-responsive">
                        dssds
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
