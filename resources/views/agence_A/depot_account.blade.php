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
@php
    $i = 0;
    $t = 0;
    $inx = 0;
@endphp
<script>
    window.onload = function(event) {
        document.getElementById("loginPopup").style.display="block";
        //document.getElementById('depo').innerHTML = 'cliquez ici';
    }
    function openForm() {
        document.getElementById("loginPopup").style.display="block";
    }

    function closeForm() {
        document.getElementById("loginPopup").style.display= "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        var modal = document.getElementById('loginPopup');
        if (event.target == modal) {
        closeForm();
        }
    }
</script>
<body class="theme-purple" onload="calcul_bill()">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-10 col-md-12 col-sm-12" style="float:left">
                <div class="col-lg-12 col-md-12 col-sm-12 card product_item">
                    <div class="body">
                        <div class="col-lg-12 col-md-12 col-sm-12" id="print">
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
                                <li>Identifiant :<span id="identifi"> A{{ $depot_account->name_client }}{{ ($depot_account->identifiantFacture)+($depot_account->id_client)+1 }}</span></li>
                            </div>
                            <div class="div-center">
                                <li>Doit :</li>
                                <li><span class="span_command" style="text-transform: uppercase;">{{ $depot_account->name_client }}</span></li>
                                <input type="hidden" name="idClient1" id="idClient1" value="{{ $depot_account->id_client }}"/>
                            </div>
                            <div style="color:#fff !important;width:auto;height:auto;"><br>
                            </div>
                            <div class="body m-b-0">
                                <table id="DataTable" class="table table-hover m-b-0">
                                    <thead>
                                    <tr>
                                        <th data-breakpoints="sm xs">N</th>
                                        <th data-breakpoints="sm xs">Nom du deposeur</th>
                                        <th data-breakpoints="sm xs">Agence</th>
                                        <th data-breakpoints="sm xs md">Montant</th>
                                        <th data-breakpoints="sm xs md">Fait le:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="col-green">1</span></td>
                                            <td><span class="col-black"><span class="span_command" style="text-transform: uppercase;">{{ $depot_account->name_client }}</span></span></td>
                                            <td><span class="text-muted">A</span></td>
                                            <td>
                                                <button onclick="openForm()" id="depo" class="btn btn-white waves-effect waves-float waves-green">CLIQUEZ ICI</button>
                                                <button class="btn btn-white waves-effect"><i class="zmdi zmdi-money"></i></button>
                                            </td>
                                            <td id="dateid">{{ date('Y-m-d') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="sl-item" style="color:#000 !important;width:100%;height:auto;">
                                <div class="content voila">
                                    <div>
                                        Ce Depot s’élève à la somme de    <span style="text-transform:uppercase;font-weight:800" id="total-letter">................................</span>  Francs CFA
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
                            <div id="putain">
                                <div class="form-group row">
                                    <br/>
                                    <div class="col-md-7">
                                        <form action="/form_add_account/{{ $depot_account->id_client }}" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                            <input type="hidden" name="sommeDepot" id="sommeDepot" value="" required>
                                            <input type="hidden" name="dateDepot" id="dateDepot" value="" required>
                                            <input type="hidden" name="identifiantDepot" id="identifiantDepot" value="" required>
                                            <button id="print-button" type="submit" class="btn btn-width btn-success">
                                                <i class="fa fa-btn fa-sign-in"></i>Enregister Le Depot
                                            </button>
                                        </form>

                                        <button class="btn btn-primary" onclick="printF()" id="imprimt">
                                            <i class="fa fa-btn fa-sign-in"></i>Imprimer
                                        </button>
                                        <a href="{{Route('delete_facture')}}">
                                            <button class="btn btn-danger">
                                                <i class="fa fa-btn fa-sign"></i>Cancel
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</body>
<div id="loginPopup" onmouseover="count()">
    <div class="form-popup" id="popupForm" style="background:#fff;width:auto;" onmouseover="count()">
        <div class="" onmouseover="count()" style="background:#fff;width:550px">
            <div class="card product_item_list" onmouseover="count()">
                <div class="body" onmouseover="count()">
                    <div class="none-plans" id="pricing-plans2" onmouseover="count()">
                        <div class="pricing-item" onmouseover="count()">
                            <div class="pricing-header">
                                <h3 class="pricing-title" style="width: auto;">AJOUTER UNE SOMME</h3>
                            </div>
                            <div class="pricing-body" onmouseover="count()">
                                <div class="price-wrapper" style="background: #10ded !important;" onmouseover="count()">
                                    <span class="price" id="result_credit2"></span>
                                        <label for="account" style="color:white;">LA SOMME DEPOSEE </label>
                                        <div class="form-group">
                                            <input type="text" name="account_client_update" id="account_client_update" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                            <span class="small btn btn-white btn-sm waves-effect">XAF</span>
                                        </div>
                                    <span class="period"></span>
                                </div>
                                    <button onclick="depo()" class="btn-hover btn-success button">VALIDER AINSI</button>
                                <a href="javascript:void()" onclick="closeForm()">
                                    <button class="btn-hover btn-danger button">Annuler</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    function depo() {
        var account_client_update = document.getElementById('account_client_update').value;
        document.getElementById('depo').innerHTML = account_client_update;
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
                document.getElementById('total-letter').innerHTML = NumberToLetter(account_client_update);

                document.getElementById('sommeDepot').value = account_client_update;
                document.getElementById('dateDepot').value = document.getElementById('dateid').innerHTML;
                document.getElementById('identifiantDepot').value = document.getElementById('identifi').innerHTML;

            }
            test();
            closeForm();
        }
        calcul_bill();
    }
</script>
</html>
