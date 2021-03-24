@extends('dashboard.dashboard')
@section('content')
<script src="{{asset('js/pages/dashboard/scripts/main.js')}}"></script>
<script src="{{asset('js/pages/dashboard/scripts/canvasjs.min.js')}}"></script>
@php
    $count_client = DB::table('client_agence_A')->count('id_client');
    $account_client = DB::table('client_agence_A')->sum('account_client');
    $name_user = DB::select('select name from users where usertype = "Chef_agence_A" ');
    $bilan_vente = DB::table('FactureCommande')->sum('totalFacture');
    $bilan_vente_count = DB::table('FactureCommande')->count('totalFacture');
    $bilan_commande_stock = DB::table('facture_print')->sum('totalFacture');
    $bilan_commande_count = DB::table('facture_print')->count('totalFacture');
    $facture_emis = DB::select('select * from facture_emis ');
    $count_facture_emis = count($facture_emis);
    //$count_facture_print = DB::select('select * from facture_print ');
@endphp
<section class="content ecommerce-page">
    <div class="block-header" onmouseover="caller()">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Produits
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Produits</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid" onmouseover="caller()">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="row">
                    <div class="body">
                        @if (session('employe'))
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('employe') }}
                                    Merci Tout est en regle
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Resume de l'agence A</h5>
                                    <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title:{
                text: "",
                horizontalAlign: "left"
            },
            data: [{
                type: "doughnut",
                startAngle: 60,
                innerRadius: 90,
                indexLabelFontSize: 12,
                indexLabel: "{label} - #percent%",
                toolTipContent: "{label}: {y} (#percent%)",
                dataPoints: [
                    { y: {{ $count_client }}, label: "Client" },
                    { y: {{ ($bilan_vente_count + $bilan_commande_count) }}, label: "Factures Totale" },
                    { y: {{ $count_facture_emis }}, label: "Facture commande"},
                    { y: {{ $bilan_commande_count }}, label: "Facture livree"},
                    { y: {{ $bilan_vente_count }}, label: "Facture a livrer"}
                ]
            }]
        });

        chart.render();
        }
    </script>
</section>
@endsection
