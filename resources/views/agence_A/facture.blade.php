@extends('agence_A.agence_A')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>La Facture
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">La Facture</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card product_item">
                    <div class="body">
                        @if (session('Client'))
                            <div class="alert alert-success" role="alert">
                                {{ session('Client') }}
                            </div>
                        @endif
                            La Facture
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection
