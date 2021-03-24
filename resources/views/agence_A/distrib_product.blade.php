@extends('agence_A.agence_A')
@section('content')
<link rel="stylesheet" href="{{asset('jss/swiper.min.css')}}">
<script src="{{asset('jss/swiper.min.js')}}"></script>
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Depots de Capitaux dans l'entreprise
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Depots </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            @if (session('insert_stock'))
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <div class="alert alert-success" role="alert">
                                {{ session('insert_stock') }}
                                Les stocks ont ete envoye a L'agence A <br> Tout est ok
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('no_insert_stock'))
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <div class="alert alert-danger" role="alert">
                                {{ session('no_insert_stock') }}
                                ERRUER Les stocks n'ont ete envoye a L'agence A <br> <button class="btn btn-alert">ERREUR</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card product_item_list">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="panel-body center">
                                <center>
                                    <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle center m-b img-responsive" width="" alt="User"/>
                                </center>
                                <br><br><br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> Distribuer les produits des Agences d'United Construction</th>
                                            </table>
                                        </center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $agenceA = 'A'
            @endphp
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="card product_item_list shadow">
                    <div class="body table-responsive ">
                        <h5>Choississez L'agence qui doit recevoir les produits</h5>
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <a href="{{ Route('distrib_product_agence.index')}}">
                                    <div class="panel-body center">
                                        <center>
                                            <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle col-sm-0 center m-b img-responsive" width="" alt="User"/>
                                        </center>
                                        <br><br><br>
                                        <div class="list" style="margin-left: 1%;list-style:none;">
                                            <p class="m-b-0 margin10 padding p12">
                                                <center>
                                                    <table style="text-align: center;">
                                                        <th> AGENCE B</th>
                                                    </table>
                                                </center>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-">
                                <div class="panel-body center">
                                    <center>
                                        <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle col-sm-0 center m-b img-responsive" width="" alt="User"/>
                                    </center>
                                    <br><br><br>
                                    <div class="list" style="margin-left: 1%;list-style:none;">
                                        <p class="m-b-0 margin10 padding p12">
                                            <center>
                                                <table style="text-align: center;">
                                                    <th> AGENCE C</th>
                                                </table>
                                            </center>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-">
                                <div class="panel-body center">
                                    <center>
                                        <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle col-sm-0 center m-b img-responsive" width="" alt="User"/>
                                    </center>
                                    <br><br><br>
                                    <div class="list" style="margin-left: 1%;list-style:none;">
                                        <p class="m-b-0 margin10 padding p12">
                                            <center>
                                                <table style="text-align: center;">
                                                    <th> AGENCE D</th>
                                                </table>
                                            </center>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
