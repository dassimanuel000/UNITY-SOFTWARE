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
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Agence A
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Agence A</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                            <div class="widget-content margin-left">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <h5 class="card-title">Nombres De Clients</h5>
                                        <div class="widget-content-left pr-2 fsize-1">
                                            <div class="widget-numbers mt-0 fsize-3 text-success">{{ number_format($count_client) }}</div>
                                        </div>
                                        <div class="widget-content-right w-100">
                                            <div class="progress-bar-xs progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $count_client }}" aria-valuemin="0" aria-valuemax="10000" style="width: {{ $count_client }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="widget-content-left fsize-1">
                                        <div class="text-muted opacity-6">Client ayant deposer dans les comptes de l'agence Sous
                                        @foreach ($name_user as $item)
                                            <strong>{{$item->name}}</strong>
                                        @endforeach</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                            <div class="widget-content margin-left">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <h4 class="product-title m-b-0">Somme Actuel Dans L'Agence A</h4>
                                        <h5 class="price m-t-0"><span class="col-amber">$ {{ number_format($account_client) }} XAF</span></h5>
                                        <div class="rating">
                                            <div class="stars">
                                                @for ($i = 0; $i < ($count_client/5); $i++)
                                                    <span class="zmdi zmdi-star col-amber"></span>
                                                @endfor
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="action">
                                            <button class="btn btn-primary btn-round waves-effect" type="button">$ {{ number_format($account_client) }} XAF</button>
                                        </div>
                                        <div class="widget-numbers mt-0 fsize-3 text-success"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Resume de l'agence A</h5>
                                    <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Bilan</strong> Ventes</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body product-report">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-9 col-sm-4">
                                <div class="icon xl-slategray m-b-20"><i class="zmdi zmdi-chart-donut"></i></div>
                                <div class="col-in">
                                    <span class="text-muted m-t-0">Bilan des commmandes Factures sans retrait de stocks</span>
                                    <h3 class="counter m-b-0">${{ number_format($bilan_vente) }} XAF</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="icon xl-slategray m-b-20"><i class="zmdi zmdi-chart"></i></div>
                                <div class="col-in">
                                    <span class="text-muted m-t-0">Bilan des commmandes Avec retrait de stocks</span>
                                    <h3 class="counter m-b-0">${{ number_format($bilan_commande_stock) }} XAF</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="icon xl-slategray m-b-20"><i class="zmdi zmdi-card"></i></div>
                                <div class="col-in">
                                    <span class="text-muted m-t-0">Bilan des commmandes </span>
                                    <h3 class="counter m-b-0">${{ number_format($bilan_commande_stock+$bilan_vente) }} XAF</h3>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="chart_Container" style="height: 270px; max-width: 980px; margin: 0px auto;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Nombres Commandes Reçues avec stocks</strong> </h2>
                    </div>
                    <div class="row">
                        <div class="body" style="margin-left:5%">
                            <h3 class="m-b-0">{{ number_format($bilan_commande_count) }}</h3>
                            <small class="displayblock">{{ ($bilan_commande_count/100) }}% Average <i class="zmdi zmdi-trending-up"></i></small>
                        </div>
                        <div class="col-lg-3">
                            <div class="iconup iconup_recus">
                                <i class="zmdi zmdi-home font-icon" style="color:#94DEP9"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Nombres Ventes totales</strong> </h2>
                    </div>
                    <div class="row">
                        <div class="body" style="margin-left:5%">
                            <h3 class="m-b-0">{{ ($bilan_vente_count + $bilan_commande_count) }}</h3>
                            <small class="displayblock">{{ (($bilan_vente_count + $bilan_commande_count)/100) }}% Average <i class="zmdi zmdi-trending-up"></i></small>
                        </div>
                        <div class="col-lg-3">
                            <div class="iconup">
                                <i class="zmdi zmdi-trending-up font-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Nombre De clients ayant etablies une facture</strong></h2>
                    </div>
                    <div class="body">
                        <h3 class="m-b-0"> {{ $bilan_commande_count-$count_client }}
                        </h3>
                        <small class="displayblock">{{ ($bilan_commande_count-$count_client)/100 }}% Average <i class="zmdi zmdi-trending-up"></i></small>
                    </div>
                </div>
            </div>
        </div>
        @php
            $stock = DB::select('select * from cash_int_a ');
        @endphp
        <div class="card">
            <div class="body">
                <ul class="pagination pagination-primary m-b-0">
                    <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
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
    var chart2 = new CanvasJS.Chart("chart_Container", {
        animationEnabled: true,
        title:{
            text: "Evolutions des ventes sur les mois"
        },
        axisY: {
            title: "",
            valueFormatString: "#0,,.",
            suffix: "mn",
            prefix: "$"
        },
        data: [{
            type: "splineArea",
            color: "rgba(54,158,173,.7)",
            markerSize: 5,
            xValueFormatString: "YY",
            yValueFormatString: "$#,##0.##",
            dataPoints: [
                { x: new Date(01, 0), y: 1 },
                @foreach ($stock as $item)
                @php
                    $date_int = Carbon\Carbon::parse($item->created_at)->month;
                @endphp
                { x: new Date({{ $date_int }}, 0), y: {{ $item->total_int}} },
                @endforeach

            ]
        }]
    });
    chart2.render();
    chart.render();
    }
</script>
@endsection
