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
</style>
@php
    $i = 0;
    $t = 0;
    $inx = 0;
@endphp
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
                            <div class="body m-b-0">
                                <table id="DataTable" class="table table-hover m-b-0">
                                    <thead>
                                    <tr>
                                        <th data-breakpoints="sm xs">Matricule</th>
                                        <th data-breakpoints="sm xs">Nom </th>
                                        <th data-breakpoints="sm xs">Agence</th>
                                        <th data-breakpoints="sm xs md">Salaire de base</th>
                                        <th data-breakpoints="sm xs md">Fait le:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="col-green">{{ $print_paye->matricule }}</span></td>
                                            <td><span class="col-black"><span class="span_command" style="text-transform: uppercase;">{{ $print_paye->nameEmp }}</span>, {{ $print_paye->prenomEmp }}</span></td>
                                            <td><span class="text-muted">{{ $print_paye->agenceEmp }}</span></td>
                                            <td>{{ number_format($print_paye->salaireBaseEmp) }} <sup>XAF</sup> </td>
                                            <td id="dateid">{{ date('Y-m-d') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="content voila">
                                <br>
                                <table class="table table-hover m-b-0">
                                    <tr>
                                        <th>Signature </th>
                                        <th>Règlement</th>
                                        <th>Signature RH</th>
                                    </tr>
                                    <tr>
                                        <td rowspan="2"><br><br></td>
                                        <td rowspan="2"><br></td>
                                        <td rowspan="2"><br><br></td>
                                    </tr>
                                </table>
                            </div>
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
                                    <a href="/salaire_employe">
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

