@extends('agence_A.agence_A')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Stocks
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Stocks</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card product_item">
                    <div class="body">
                        <div class="cp_img">
                            <div class="hover">
                                <a href="javascript:void(0);" class="btn btn-primary btn-sm waves-effect"><i class="zmdi zmdi-plus"></i></a>
                                <a href="javascript:void(0);" class="btn btn-primary btn-sm waves-effect"><i class="zmdi zmdi-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card product_item">
                    <div class="product_details">
                            <h3><a href="#">{{ $client_agence_A->name_client }}</a></h3>
                            <h3><a href="#">{{ $client_agence_A->adress_client }}</a></h3>
                            <h3><a href="#">{{ $client_agence_A->telephone_client }}</a></h3>
                            <ul class="product_price list-unstyled">
                                <li class="old_price color-green">{{ $client_agence_A->sexe_client }}</li>
                                <li class="old_price color-red">{{ $client_agence_A->account_client }}</li>
                            </ul>
                    </div>
                        <a href="/list_client" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-assignment-return"></i><pre>BACK</pre></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
