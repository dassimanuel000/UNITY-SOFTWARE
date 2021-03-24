@extends('Chef_agence_B.Chef_agence_B')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>AGENCE FILLE
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">AGENCE FILLE</li>
                </ul>
            </div>
        </div>
    </div>
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
                                                <th> GESTION DES STOCKS</th>
                                            </table>
                                            <div class="card_hover responsive">
                                                <a href="{{route('agence_b.reception_produit')}}">
                                                    <button class="btn-hover color-9 button-dashboard">AJOUTER LES PRODUITS</button>
                                                </a>
                                                <a href="{{ route('agence_b.list_produit') }}">
                                                    <button class="btn-hover color-11 button-dashboard btn-responsive">RECHERCHER UN PRODUIT</button>
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
        </div>
        <br><br><br><br><br>
    </div>
</section>
@endsection
