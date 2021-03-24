<!--doctype html-->
<html class="" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="Stock management template" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('/css/dataTables.min.css')}}"/>

    <!--STYLES
        <title>{{ config('app.name', 'Laravel') }}</title>
    -->
    <title>United Construction</title>
    <!--STYLES-->
    @include('includes.agence_A.styles')
    </head>
<body class="theme-purple" id="body">
<script src="{{asset('js/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/templatemo.css')}}">
<style>
    .float-left{
        font-weight: 500;
        letter-spacing: normal;
        list-style: none;
    }
    .input-disappear{
        background: none;
        border: none;
        content: none;
    }
    #DataTable:hover .input-disappear{
        background: initial;
        border: 0.5px solid dimgray;
    }
    .input_none{
        background: none;
        border: none;
        content: none;
        font-weight: 700;
    }
    .nonen{
        display: none;
    }
    .class_td_valide{
        display: initial;
    }
    .td_invisible{
        display: none;
    }
    .th_hover{
        display: none;
    }
    .th_alert{
        background-color: orangered;
    }
    .body_table:hover .th_hover{
        display: initial;
    }
    .account{
        margin-left: 25%;
    }
    .div_error{
        display: none;
    }

</style>
@php
    $i = 0;
    $t = 0;
    $inx = 0;
@endphp
@if (session('id_account_client_update'))
<div class="alert alert-success" role="alert">
    {{ session('id_account_client_update') }}
    <div class="success">Le comte est modifier</div>
</div>
@endif
    @if (session(''))
    <div class="alert alert-success" role="alert">
        {{ session('') }}

    </div>
    @endif
<body class="theme-purple" onload="calcul_bill()">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-10" style="float:left">
                <div class="card product_item">
                    <div class="body">
                        <div id="print" class="">
                            <div class="div-center">
                                <div class="gauce">
                                    <div class="img">
                                        <img src="{{asset('images/test.png')}}" alt="Unity" srcset="" class="img-respomsable img-fluid">
                                    </div>
                                </div>
                                <div class="cwentre">
                                    <div class="col-lg-7 col-md-6 col-sm-12">
                                        <br>
                                        <h2>
                                            <small>United Construction</small>
                                        </h2>
                                    </div>
                                </div>
                                <div class="drpote">
                                    <div class="streamline b-accent">
                                        <div class="sl-item">
                                            <div class="sl-content ladate">
                                                <span>Date : {{ date('Y-m-d') }}</span>
                                                <br>
                                                <span>Heure : {{ date('H:i:s') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-left">
                                <li>Agence : SA'A Mont&eacute;e Marie</li>
                                <li>Tél : +(237) 677 53 78 95</li>
                                <li>Gestionnaire : {{ Auth::user()->name }}</li>
                                <li>Telephone : {{ Auth::user()->phone }} </li>
                            </div>
                            <div class="float-rights"  style="margin-bottom:1%;">
                                <li>United Construction</li>
                                <li>Face complexe T. Bella</li>
                                <li>uniteconstruction@gmail.com</li>
                                <li>+(237) 677 53 78 95</li>
                            </div>
                        @php
                            $add_product = DB::table('stock_agence_A')->where('quantity','>' ,'0')->orderBy('title', 'ASC')->get();
                        @endphp
                        <div class="body table-responsive">
                        @if (session('add_product'))
                            <div class="alert alert-success" role="alert">
                                {{ session('add_product') }}
                            </div>
                        @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="9" align="center"> LISTES DES PRODUITS EN STOCKS</td>
                                    </tr>
                                <tr>
                                    <th data-breakpoints="sm xs">N</th>
                                    <th>Referent</th>
                                    <th data-breakpoints="sm xs">Titre</th>
                                    <th data-breakpoints="sm xs">Categories</th>
                                    <th data-breakpoints="sm xs md">Quantit&eacute;s</th>
                                    <th data-breakpoints="sm xs md">Prix Min</th>
                                    <th data-breakpoints="sm xs md">Prix Max</th>
                                    <th data-breakpoints="sm xs md">Prix d'achat</th>
                                    <th data-breakpoints="sm xs md">Type du Produit</th>
                                    <th data-breakpoints="sm xs md">Fournisseurs</th>
                                </tr>
                                </thead>
                                <tbody>
                                        @foreach ($add_product as $row)

                                <tr>
                                    <td><span class="col-green">{{ $i }}</span></td>
                                    <td>{{ $row->referent }}</td>
                                    <td><span class="text-muted">{{ $row->title }}</span></td>
                                    <td><span class="text-muted">{{ ($row->category) }}</span></td>
                                    <td><span class="text-muted">{{ number_format($row->quantity) }}</span></td>
                                    <td class="price_min"><span class="col-green">{{ number_format($row->price_min) }}</span></td>
                                    <td class="price_max"><span class="col-red">{{ number_format($row->price_max) }}</span></td>
                                    <td><span class="text-muted">{{ number_format($row->price_achat) }}</span></td>
                                    <td><span class="text-muted">{{ $row->product_type }}</span></td>
                                    <td><span class="text-muted">{{ $row->provider }}</span></td>
                                </tr>
                                @php
                                    $i += 1;
                                @endphp

                                @endforeach

                                </tbody>
                            </table>

                            <div class="sl-content" style="color:#000 !important;width:auto;height:auto;margin-left:10%">
                                <small>N° de contribuable : P087000147362M.</small>
                                <small><strong>Email:</strong> uniteconstruction@gmail.com</small><br>
                                <small>UNITE CONSTRUCTION, société de commercialisation des matériaux de construction et pièces détachées.</small>
                            </div>
                        </div>
                        <div id="putain">
                            <div class="form-group row">
                                <br/>
                                <div class="col-md-7">
                                    <button class="btn btn-primary" onclick="printF()" id="imprimt">
                                        <i class="fa fa-btn fa-sign-in"></i>Imprimer
                                    </button>
                                    <a href="/agence_A">
                                        <button class="btn btn-danger">
                                            <i class="fa fa-btn fa-sign"></i>BACK
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <script>
                                function prins() {
                                    window.print();
                                }
                                function dispar() {
                                    var repar = document.getElementById('putain');
                                    repar.classList.remove("nonen");
                                    repar.classList.add("visiblese");
                                    document.getElementById("imprimt").style.display="none";
                                }
                                function name() {
                                    alert('wewe');
                                }
                                function printF() {
                                    var none = document.getElementById('putain');
                                    none.classList.add("nonen");

                                    if (confirm('Are you sure ? Vous ne pourez rien modifier') == true) {
                                        setTimeout(prins, 50);
                                    } else {
                                        setTimeout(dispar, 5000);
                                    }
                                    setTimeout(dispar, 50);
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

