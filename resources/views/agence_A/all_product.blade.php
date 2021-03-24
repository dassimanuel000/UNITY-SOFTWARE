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
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="card product_item_list card_box">
                            {{ session('status') }}
                            Erreur dans la creation du produits {{ json_encode($request)}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card product_item_list card_box">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="panel-body center">
                                <center>
                                    <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle center m-b img-responsive" width="" alt="User"/>
                                </center>
                                <br><br><br>
                                <div class="list " style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> GESTION DES CLIENTS</th>
                                            </table>
                                            <div class="card_hover responsive">
                                                <a href="{{route('agence_A.add_client.index')}}">
                                                    <button class="btn-hover color-9 button-dashboard">RECHERCHER UN CLIENT</button>
                                                </a>
                                                <a href="{{ route('agence_A.client_add.client_add') }}">
                                                    <button class="btn-hover color-11 button-dashboard btn-responsive">AJOUTER UN CLIENT</button>
                                                </a>
                                            </div>
                                        </center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card product_item_list card_box">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="panel-body center">
                                <center>
                                    <img src="{{asset('../images/D/Online shopping.png')}}" class="img-circle center m-b img-responsive" width="" alt="User"/>
                                </center>
                                <br><br><br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> FACTURER</th>
                                            </table>
                                            <div class="card_hover responsive">
                                                <a href="{{ route('agence_A.live_commande') }}">
                                                    <button class="btn-hover color-5 button-dashboard">CREER UNE FACTURE</button>
                                                </a>
                                            </div>
                                        </center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card product_item_list card_box">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="panel-body center">
                                <center>
                                    <img src="{{asset('../images/D/Site-constructor.png')}}" class="img-circle center m-b img-responsive" width="" alt="User"/>
                                </center>
                                <br><br><br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th>GESTION DES PRODUITS</th>
                                            </table>
                                            <div class="card_hover responsive">
                                                <a href="{{ route('distrib_product.index') }}">
                                                    <button class="btn-hover color-3 button-dashboard btn-responsive">DISPACTHER LES PRODUITS DANS LES AGENCES</button>
                                                </a>
                                                <a href="/add_product">
                                                    <button class="btn-hover color-1 button-dashboard btn-responsive">AJOUTER LES PRODUITS DANS LES AGENCES</button>
                                                </a>
                                            </div>
                                        </center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
        </div>
    </div>
</div>
</section>
@endsection
