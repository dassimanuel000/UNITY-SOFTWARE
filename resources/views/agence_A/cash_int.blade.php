@extends('agence_A.agence_A')
@section('content')
@php
    use Carbon\Carbon;
@endphp
<section class="content ecommerce-page" onmouseover="tot()">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Commandes
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Depots effectuees</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <!--<div class="col-lg-4 col-md-3 col-sm-3">
                <div class="card product_item_list">
                    <div class="card-body">
                        <ul class="breadcrumb float-md-">
                            <li class="breadcrumb-item"><i class="zmdi zmdi-home"></i> Les Inventaires journali&egrave;res</li>
                        </ul>
                        @php
                            $jour_cash_int = DB::select('select * from cash_int_a group by jour_int' );
                        @endphp
                        @foreach ($jour_cash_int as $jour_item)
                            <a href="" class="btn btn-primary">{{ $jour_item->jour_int }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3">
                <div class="card product_item_list">
                    <div class="card-body">
                        <ul class="breadcrumb float-md-">
                            <li class="breadcrumb-item"><i class="zmdi zmdi-home"></i> Les Inventaires Mensuels</li>
                        </ul>
                        <div class="table-responsive table-upgrade">
                            <table class="table">
                              <thead>
                                <th>Mois</th>
                                <th>Imprimer</th>
                            </thead>
                            <tbody>
                                @php
                                    $mois_cash_int = DB::select('select DISTINCT mois_int, created_at from cash_int_a' );
                                @endphp
                                @foreach ($mois_cash_int as $date_item)
                                <tr>
                                    <th>{{ $date_item->mois_int }} {{ (date('d F Y', strtotime($date_item->created_at))) }}</th>
                                    <th><a href="" class="btn btn-primary">IMPRIMER</a></th>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3">
                <div class="card product_item_list">
                    <div class="card-body">
                        <ul class="breadcrumb float-md-">
                            <li class="breadcrumb-item"><i class="zmdi zmdi-home"></i> Les Inventaires annuels</li>
                        </ul>
                        <form action="/form_compta_print" method="get">
                            <input type="hidden" name="request" value="cash_int">
                            <button type="submit" class="btn btn-success btn-lg">Tout imprimer</button>
                        </form>
                    </div>
                </div>
            </div>-->
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="card-body">
                        <div class="body col-md-12">
                            <form action="/form_compta_print" method="get">
                                <input type="hidden" name="request" value="cash_int">
                                <button type="submit" class="btn btn-success btn-lg">Tout imprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 ">
                <div class="card product_item_list">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive table-upgrade">
                                <table class="table">
                                  <thead>
                                    <th>N*</th>
                                    <th>Client  </th>
                                    <th>Motif du depot</th>
                                    <th>Somme deposee</th>
                                    <th>Date </th>
                                    <th>Voir la facture</th>
                                </thead>
                                <tbody>
                                    @php
                                        $cash_int = DB::table('cash_int_a')
                                                    //->where('table','LIKE','%my_space%')
                                                    ->paginate(10);
                                    @endphp
                                    @foreach ($cash_int as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            @php
                                                $name_client = json_decode(($item->name_client), true);
                                                for ($i=0; $i < 1; $i++) {
                                                    echo $name_client[$i];
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            {{ $item->type }} <br>
                                            Identifiant : <strong>{{ $item->id_facture }}</strong><br>
                                            @if (( $item->type ) == 'COMMANDE')
                                                Produits commandes: {{ $item->quantity }}
                                            @else
                                                Somme deposee: {{ number_format($item->price_int) }}
                                            @endif
                                        </td>
                                        <td>{{ number_format($item->total_int) }} <sup>XAF</sup></td>
                                        <td>
                                            {{ Carbon::parse($item->created_at)->diffforHumans() }} <br> Fait le :{{ (date('d F Y', strtotime($item->created_at)))  }}
                                        <td>
                                            @php
                                                $idfacture_emis = DB::select('select idfacture_emis from facture_emis where identifiantFacture = "'.$item->id_facture.'" ');
                                            @endphp
                                            @foreach ($idfacture_emis as $_id)
                                                <a href="/facture_emis_commande/{{$_id->idfacture_emis}}" class="btn btn-primary btn-block">IMPRIMER</a>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 col-sm-12">

            </div>
            <div class="hr">
                <hr/>
            </div>
            <div class="col-md-7">
                <a href="/agence_A">
                    <button class="btn btn-danger">
                        <i class="fa fa-btn fa-sign"></i>Cancel
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
