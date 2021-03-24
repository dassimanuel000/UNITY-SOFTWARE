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

    .filigramme{
        background-position: center;
        background-repeat: no-repeat;
        background: url('images/copie.png');
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
                        <div id="print" class="filigramme" style="background: url({{asset('images/copie.png')}});background-repeat: no-repeat;background-position: center;">
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
                                <li>Identifiant : {{ ($facture_emis_commande->identifiantFacture)}}</li>
                            </div>
                            <div class="div-center">
                                <li>Doit :</li>
                                @php
                                    $nameClient = json_decode(($facture_emis_commande->nameClient), true);
                                    $nameClient = $nameClient[0];
                                @endphp
                                <li><span class="span_command" style="text-transform: uppercase;">{{ $nameClient }}</span></li>
                            </div>
                            <div style="color:#fff !important;width:auto;height:auto;"><br>
                            <table id="DataTable" class="table table-hover m-b-0">
                            </div>
                                <thead class="body_table2">
                                <tr>
                                    <th class="xs-small" data-breakpoints=" xs">N.</th>
                                    <th>D&eacute;signation</th>
                                    <th class="quantity-small-td" data-breakpoints="quantity-small-td">Quantit&eacute; Command&eacute;</th>
                                    <th>Prix Unitaire</th>
                                    <th data-breakpoints="cs">Prix Total</th>
                                    <th class="th_hover"></th>
                                </tr>
                                </thead>
                                <tbody class="body_table" id="shopping_cart" onmouseover="calcul_bill()">
                                    @php
                                        $count = 0;
                                        $allProduct = json_decode(($facture_emis_commande->allProduct), true);

                                        $allQuantityCommande = json_decode(($facture_emis_commande->allQuantityCommande), true);

                                        $allPriceUnitaire = json_decode(($facture_emis_commande->allPriceUnitaire), true);

                                        $allPriceTotal = json_decode(($facture_emis_commande->allPriceTotal), true);

                                    @endphp
                                    @for ($i = 0; $i < count($allQuantityCommande); $i++)
                                        <tr>
                                            <th>{{$i}}</th>
                                            <th>{{$allProduct[$i]}}</th>
                                            <th><input name="taxe_product" id="quantity_facture{{$i}}" type="text" class="input_none" value="{{$allQuantityCommande[$i]}}"/></th>
                                            <th><input name="price_min_facture" id="price_min_facture{{$i}}" type="text" class="input_none" value="{{$allPriceUnitaire[$i]}}" /></th>
                                            <th><input name="allPriceTotal" id="allPriceTotal{{$i}}" type="text" class="input_none" value="{{$allPriceTotal[$i]}}" /></th>
                                        </tr>
                                    @endfor
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td colspan="3" align="right"> Total : </td>
                                        <td id="total_factures" style="background-color: rgb(231, 231, 231);text-align:center;font-weight:bolder" colspan="3">
                                            <input id="total_facture" type="hidden" name="" value="{{ $facture_emis_commande->totalFacture}}">
                                            @php
                                            $total_facture = $facture_emis_commande->totalFacture;
                                            echo number_format($total_facture);
                                            @endphp
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="sl-item" style="color:#000 !important;width:100%;height:auto;">
                                <div class="content voila">
                                    <div>
                                        Cette commande s’élève à la somme de    <span style="text-transform:uppercase;font-weight:800" id="total-letter">..................................................................</span>  Francs CFA
                                    </div>
                                    <br>
                                    <table class="table table-hover m-b-0">
                                        <tr>
                                            <th>Signature Vendeur</th>
                                            <th>Règlement</th>
                                            <th>Signature client</th>
                                        </tr>
                                        <tr>
                                            <td rowspan="2"><br><br></td>
                                            <td rowspan="2">Modalité de règlement<br></td>
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
                        </div>
                        <div id="putain">
                            <div class="form-group row">
                                <br/>
                                <div class="col-md-7">
                                    <button class="btn btn-primary" onclick="printF()" id="imprimt">
                                        <i class="fa fa-btn fa-sign-in"></i>Imprimer
                                    </button>
                                    <a href="/facture_emis">
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
                            <script>
                                function calcul_bill() {

                                    function Unite( nombre ){
                                        var unite;
                                        switch( nombre ){
                                            case 0: unite = "zéro";		break;
                                            case 1: unite = "un";		break;
                                            case 2: unite = "deux";		break;
                                            case 3: unite = "trois"; 	break;
                                            case 4: unite = "quatre"; 	break;
                                            case 5: unite = "cinq"; 	break;
                                            case 6: unite = "six"; 		break;
                                            case 7: unite = "sept"; 	break;
                                            case 8: unite = "huit"; 	break;
                                            case 9: unite = "neuf"; 	break;
                                        }//fin switch
                                        return unite;
                                    }

                                    function Dizaine( nombre ){
                                        switch( nombre ){
                                            case 10: dizaine = "dix"; break;
                                            case 11: dizaine = "onze"; break;
                                            case 12: dizaine = "douze"; break;
                                            case 13: dizaine = "treize"; break;
                                            case 14: dizaine = "quatorze"; break;
                                            case 15: dizaine = "quinze"; break;
                                            case 16: dizaine = "seize"; break;
                                            case 17: dizaine = "dix-sept"; break;
                                            case 18: dizaine = "dix-huit"; break;
                                            case 19: dizaine = "dix-neuf"; break;
                                            case 20: dizaine = "vingt"; break;
                                            case 30: dizaine = "trente"; break;
                                            case 40: dizaine = "quarante"; break;
                                            case 50: dizaine = "cinquante"; break;
                                            case 60: dizaine = "soixante"; break;
                                            case 70: dizaine = "soixante-dix"; break;
                                            case 80: dizaine = "quatre-vingt"; break;
                                            case 90: dizaine = "quatre-vingt-dix"; break;
                                        }//fin switch
                                        return dizaine;
                                    }
                                    function test() {

                                        function NumberToLetter( nombre ){
                                            var i, j, n, quotient, reste, nb ;
                                            var ch
                                            var numberToLetter='';
                                            //__________________________________

                                            if(  nombre.toString().replace( / /gi, "" ).length > 15  )	return "dépassement de capacité";
                                            if(  isNaN(nombre.toString().replace( / /gi, "" ))  )		return "Nombre non valide";

                                            nb = parseFloat(nombre.toString().replace( / /gi, "" ));
                                            if(  Math.ceil(nb) != nb  )	return  "Nombre avec virgule non géré.";

                                            n = nb.toString().length;
                                            switch( n ){
                                                case 1: numberToLetter = Unite(nb); break;
                                                case 2: if(  nb > 19  ){
                                                            quotient = Math.floor(nb / 10);
                                                            reste = nb % 10;
                                                            if(  nb < 71 || (nb > 79 && nb < 91)  ){
                                                                    if(  reste == 0  ) numberToLetter = Dizaine(quotient * 10);
                                                                    if(  reste == 1  ) numberToLetter = Dizaine(quotient * 10) + "-et-" + Unite(reste);
                                                                    if(  reste > 1   ) numberToLetter = Dizaine(quotient * 10) + "-" + Unite(reste);
                                                            }else numberToLetter = Dizaine((quotient - 1) * 10) + "-" + Dizaine(10 + reste);
                                                        }else numberToLetter = Dizaine(nb);
                                                        break;
                                                case 3: quotient = Math.floor(nb / 100);
                                                        reste = nb % 100;
                                                        if(  quotient == 1 && reste == 0   ) numberToLetter = "cent";
                                                        if(  quotient == 1 && reste != 0   ) numberToLetter = "cent" + " " + NumberToLetter(reste);
                                                        if(  quotient > 1 && reste == 0    ) numberToLetter = Unite(quotient) + " cents";
                                                        if(  quotient > 1 && reste != 0    ) numberToLetter = Unite(quotient) + " cent " + NumberToLetter(reste);
                                                        break;
                                                case 4 :  quotient = Math.floor(nb / 1000);
                                                            reste = nb - quotient * 1000;
                                                            if(  quotient == 1 && reste == 0   ) numberToLetter = "mille";
                                                            if(  quotient == 1 && reste != 0   ) numberToLetter = "mille" + " " + NumberToLetter(reste);
                                                            if(  quotient > 1 && reste == 0    ) numberToLetter = NumberToLetter(quotient) + " mille";
                                                            if(  quotient > 1 && reste != 0    ) numberToLetter = NumberToLetter(quotient) + " mille " + NumberToLetter(reste);
                                                            break;
                                                case 5 :  quotient = Math.floor(nb / 1000);
                                                            reste = nb - quotient * 1000;
                                                            if(  quotient == 1 && reste == 0   ) numberToLetter = "mille";
                                                            if(  quotient == 1 && reste != 0   ) numberToLetter = "mille" + " " + NumberToLetter(reste);
                                                            if(  quotient > 1 && reste == 0    ) numberToLetter = NumberToLetter(quotient) + " mille";
                                                            if(  quotient > 1 && reste != 0    ) numberToLetter = NumberToLetter(quotient) + " mille " + NumberToLetter(reste);
                                                            break;
                                                case 6 :  quotient = Math.floor(nb / 1000);
                                                            reste = nb - quotient * 1000;
                                                            if(  quotient == 1 && reste == 0   ) numberToLetter = "mille";
                                                            if(  quotient == 1 && reste != 0   ) numberToLetter = "mille" + " " + NumberToLetter(reste);
                                                            if(  quotient > 1 && reste == 0    ) numberToLetter = NumberToLetter(quotient) + " mille";
                                                            if(  quotient > 1 && reste != 0    ) numberToLetter = NumberToLetter(quotient) + " mille " + NumberToLetter(reste);
                                                            break;
                                                case 7: quotient = Math.floor(nb / 1000000);
                                                            reste = nb % 1000000;
                                                            if(  quotient == 1 && reste == 0  ) numberToLetter = "un million";
                                                            if(  quotient == 1 && reste != 0  ) numberToLetter = "un million" + " " + NumberToLetter(reste);
                                                            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " millions";
                                                            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " millions " + NumberToLetter(reste);
                                                            break;
                                                case 8: quotient = Math.floor(nb / 1000000);
                                                            reste = nb % 1000000;
                                                            if(  quotient == 1 && reste == 0  ) numberToLetter = "un million";
                                                            if(  quotient == 1 && reste != 0  ) numberToLetter = "un million" + " " + NumberToLetter(reste);
                                                            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " millions";
                                                            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " millions " + NumberToLetter(reste);
                                                            break;
                                                case 9: quotient = Math.floor(nb / 1000000);
                                                            reste = nb % 1000000;
                                                            if(  quotient == 1 && reste == 0  ) numberToLetter = "un million";
                                                            if(  quotient == 1 && reste != 0  ) numberToLetter = "un million" + " " + NumberToLetter(reste);
                                                            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " millions";
                                                            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " millions " + NumberToLetter(reste);
                                                            break;
                                                case 10: quotient = Math.floor(nb / 1000000000);
                                                                reste = nb - quotient * 1000000000;
                                                                if(  quotient == 1 && reste == 0  ) numberToLetter = "un milliard";
                                                                if(  quotient == 1 && reste != 0  ) numberToLetter = "un milliard" + " " + NumberToLetter(reste);
                                                                if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " milliards";
                                                                if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " milliards " + NumberToLetter(reste);
                                                                break;
                                                case 11: quotient = Math.floor(nb / 1000000000);
                                                                reste = nb - quotient * 1000000000;
                                                                if(  quotient == 1 && reste == 0  ) numberToLetter = "un milliard";
                                                                if(  quotient == 1 && reste != 0  ) numberToLetter = "un milliard" + " " + NumberToLetter(reste);
                                                                if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " milliards";
                                                                if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " milliards " + NumberToLetter(reste);
                                                                break;
                                                case 12: quotient = Math.floor(nb / 1000000000);
                                                                reste = nb - quotient * 1000000000;
                                                                if(  quotient == 1 && reste == 0  ) numberToLetter = "un milliard";
                                                                if(  quotient == 1 && reste != 0  ) numberToLetter = "un milliard" + " " + NumberToLetter(reste);
                                                                if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " milliards";
                                                                if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " milliards " + NumberToLetter(reste);
                                                                break;
                                                case 13: quotient = Math.floor(nb / 1000000000000);
                                                                reste = nb - quotient * 1000000000000;
                                                                if(  quotient == 1 && reste == 0  ) numberToLetter = "un billion";
                                                                if(  quotient == 1 && reste != 0  ) numberToLetter = "un billion" + " " + NumberToLetter(reste);
                                                                if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " billions";
                                                                if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " billions " + NumberToLetter(reste);
                                                                break;
                                                case 14: quotient = Math.floor(nb / 1000000000000);
                                                                reste = nb - quotient * 1000000000000;
                                                                if(  quotient == 1 && reste == 0  ) numberToLetter = "un billion";
                                                                if(  quotient == 1 && reste != 0  ) numberToLetter = "un billion" + " " + NumberToLetter(reste);
                                                                if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " billions";
                                                                if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " billions " + NumberToLetter(reste);
                                                                break;
                                                case 15: quotient = Math.floor(nb / 1000000000000);
                                                                reste = nb - quotient * 1000000000000;
                                                                if(  quotient == 1 && reste == 0  ) numberToLetter = "un billion";
                                                                if(  quotient == 1 && reste != 0  ) numberToLetter = "un billion" + " " + NumberToLetter(reste);
                                                                if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " billions";
                                                                if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " billions " + NumberToLetter(reste);
                                                                break;
                                            }//fin switch
                                        /*respect de l'accord de quatre-vingt*/
                                            if(  numberToLetter.substr(numberToLetter.length-"quatre-vingt".length,"quatre-vingt".length) == "quatre-vingt"  ) numberToLetter = numberToLetter + "s";

                                            return numberToLetter;
                                        }

                                        //alert(num2Letters(parseInt(userEntry, 10)));
                                        var total_facture_definitif = parseInt(document.getElementById('total_facture').value);
                                        document.getElementById('total-letter').innerHTML = NumberToLetter(total_facture_definitif);
                                    }
                                    test();
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

