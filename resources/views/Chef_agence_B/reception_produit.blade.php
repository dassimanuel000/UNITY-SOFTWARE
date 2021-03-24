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
            @if (session('stock_error'))
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-body card product_item_list responsive">
                    <div class="alert alert-success" role="alert">
                        {{ session('stock_error') }}
                        <b class=" btn-danger">RETOUR DU PRODUIT A L'AGENCE MERE</b>
                    </div>
                </div>
            </div>
            @endif
            @if (session('stock_update'))
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-body card product_item_list responsive">
                    <div class="alert alert-success" role="alert">
                        {{ session('stock_update') }}
                        <b class=" btn-block">LE PRODUIT est OK</b>
                    </div>
                </div>
            </div>
            @endif
            @if (session('stock_add'))
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card-body card product_item_list responsive">
                    <div class="alert alert-success" role="alert">
                        {{ session('stock_add') }}
                        <b class="">LE PRODUIT est OK</b>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-10 col-md-10 col-sm-12 ">
                <div class="card product_item_list ">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="col-lg-14 col-md-14 border-bottom">
                                <h3 class="heading">PRODUITS DEJA EN STOCKS</h3>
                                @php
                                    /*$stock_in = DB::select('select id_mere from stock_vente_B where correct = 0');
                                    $last_stock = array();
                                    foreach ($stock_in as $value) {
                                        $last_stock = DB::select('select * from stock_agence_B where id_mere ='.$value->id_mere.' and correct = 0');
                                    }*/
                                    $last_stock = DB::select('select * from stock_agence_B where correct = 0');
                                @endphp
                            </div>
                            @if ($last_stock)
                            <div class="table-responsive responsive">
                                <table id="DataTable" class="table responsive table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th data-breakpoints="sm xs">Image</th>
                                            <th data-breakpoints="sm xs">Nom produit</th>
                                            <th data-breakpoints="sm xs">Prix min</th>
                                            <th data-breakpoints="sm xs">Quantite Envoy&eacute;e</th>
                                            <th data-breakpoints="sm xs">Livraison bien recu</th>
                                            <th data-breakpoints="sm xs">Livraison Incomplete</th>
                                        </tr>
                                    </thead>
                                    <div class="table-responsive responsive">
                                        <tbody id='tbody'>
                                            @foreach ($last_stock as $item)
                                            <tr>
                                                <td><img src="../uploads/stock_agence_A/{{$item->image}}" alt="image produit" class="img-responsive responsive" height="60px" srcset=""></td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->price_min}}</td>
                                                <td> <button class="btn btn-white btn-md col-black text-title title "> {{$item->quantity}}</button> </td>
                                                <td>
                                                    <form action="/agence_b/form_update_stock/{{ $item->id }}" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        <input type="hidden" name="quantity_update" id="quantity_update" readonly required value="{{ $item->quantity }}">
                                                        <input type="hidden" name="update_id" id="update_id" readonly required value="{{ $item->id_mere }}">
                                                        <div class="nonen none" style="display: none;">
                                                            <input type="hidden" name="update_id_emp" value="{{ Auth::user()->id }}" required readonly>
                                                            <input type="hidden" name="update_name_emp" value="{{ Auth::user()->name }}" required readonly>
                                                            <input type="hidden" name="update_referent" value="{{ $item->referent }}" readonly>
                                                            <input type="hidden" name="update_title" value="{{ $item->title }}" readonly>
                                                            <input type="hidden" name="update_price_min" value="{{ $item->price_min }}" readonly>
                                                            <input type="hidden" name="update_price_max" value="{{ $item->price_max }}" readonly>
                                                            <input type="hidden" name="update_price_achat" value="{{ $item->price_achat }}" readonly>
                                                            <input type="hidden" name="update_quantity" value="{{ $item->quantity }}" readonly>
                                                            <input type="hidden" name="update_image" value="{{ $item->image }}" readonly>
                                                        </div>
                                                        <button type="submit" class="btn btn-success"><i class="zmdi zmdi-check-circle"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="/agence_b/form_error_livraison/{{ $item->id }}" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        <button class="btn btn-danger"><i class="zmdi zmdi-close"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                            @else
                            <div>
                                <button class="btn btn-danger btn-block btn-lg">AUCUN PRODUIT ENVOY&Eacute; RECEMMENT   </button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
