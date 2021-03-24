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
    .input-disap{
        background: none;
        border: none;
        content: none;
    }
    #DataTable:hover .input-disappear{
        background: initial;
        border: 0.5px solid dimgray;
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
    .body_table:hover .th_hover{
        display: initial;
    }
    #probleme{
        display: none;
    }
    .backred{
        background-color: rgba(255, 56, 116, 0.24);
        font-weight: 800;
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

<body class="theme-purple" onload="calcul_bill()">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-10">
                <div class="card product_item">
                    <div class="body">
                        <div id="print">
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
                                <li>Identifiant : {{ $facture_livraison->identifiantFacture }}</li>
                            </div>
                            <form action="/facture_livraision_definitif/{{$facture_livraison->idFactureCommande}}" onsubmit="return true" method="get">
                                <div class="div-center">
                                    <li>Doit :</li>
                                    @php
                                        $nameClient = json_decode(($facture_livraison->nameClient), true);
                                        $nameClient = $nameClient[0];
                                    @endphp
                                    <li><span class="span_command" style="text-transform: uppercase;">{{ $nameClient }}</span></li>

                                </div>
                                <table id="DataTable" class="table table-hover m-b-0">
                                    <thead>
                                    <tr>
                                        <th class="xs-small" data-breakpoints=" xs">N.</th>
                                        <th>D&eacute;signation</th>
                                        <th class="quantity-small-td" data-breakpoints="quantity-small-td">Quantit&eacute; Command&eacute;</th>
                                        <th>Quantit&eacute; retir&eacute;e</th>
                                        <th>Quantit&eacute; restante</th>
                                        <th>Prix Unitaire</th>
                                        <th data-breakpoints="cs">Prix Total</th>
                                        <th class="th_hover"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="body_table" id="shopping_cart" onmouseover="calcul_bill()">
                                        @php

                                        $count = 0;

                                            //$nameClient = json_decode(($facture_livraison->nameClient), true);

                                            $allProduct = json_decode(($facture_livraison->allProduct), true);

                                            $allQuantityCommande = json_decode(($facture_livraison->allQuantityCommande), true);

                                            $allPriceUnitaire = json_decode(($facture_livraison->allPriceUnitaire), true);

                                            $allPriceTotal = json_decode(($facture_livraison->allPriceTotal), true);

                                            $allQuantityRetire = json_decode(($facture_livraison->allQuantityRetire), true);


                                            for ($index=0; $index < count($allQuantityCommande); $index++) {

                                            echo '<tr>'
                                                .'<th>'.$i.'</th>'
                                                .'<th>'.$allProduct[$index].'</th>'
                                                .'<th>'.'<input type="text" id="quantity_facture'.$i.'" value="'.$allQuantityCommande[$index].'" class="input-disap" readonly/></th>'
                                                .'<th>'.'<input name="retire'.$i.'" id="retire'.$i.'" type="text" class="input-disappear" value="'.$allQuantityRetire[$index].'" max="'.$allQuantityCommande[$index].'" onkeyup="if(parseInt(this.value)>'.$allQuantityCommande[$index].'){ this.value ='.$allQuantityCommande[$index].'; return false; }" required/>'.'</th>'
                                                .'<th>'.'<span name="restante" id="restante'.$i.'" class="input-disap">'.$allQuantityCommande[$index].'</span>'.'</th>'
                                                .'<th id="total_produit_factures'.$i.'">'.number_format($allPriceUnitaire[$index]).'</th>'
                                                .'<th>'.number_format($allPriceTotal[$index]).'</th>'
                                            .'</tr>';
                                            $i++;
                                            $count += $index;

                                    }
                                        @endphp
                                        <input type="hidden" id="countable" name="count" value="<?php echo $i;?>">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <td colspan="5" align="right"> Total : </td>
                                            <td id="total_facture" colspan="2">
                                                @php
                                                $total_facture = $facture_livraison->totalFacture;
                                                echo number_format($total_facture);
                                                @endphp
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <br>
                                </form>
                                </table>
                                <div class="sl-item" style="color:#000 !important;width:100%;height:auto;">
                                    <div class="content voila">
                                        <div>
                                            Cette commande s’élève à la somme de    <span style="text-transform:uppercase;font-weight:800" id="total-letter">..................................................................</span>  Francs CFA
                                        </div>
                                        @if ($allQuantityRetire > 0)
                                        <bdi>Dernier Retrait qui date du : {{ $facture_livraison->updated_at}}</bdi>
                                        @endif
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
                                <div id="loginPopup" onmouseover="count()">
                                    <div class="form-popup" id="popupForm" style="background:#fff;width:auto;" onmouseover="count()">
                                        <div class="" onmouseover="count()" style="background:#fff;width:750px;margin-left:-50%;">
                                            <div class="card product_item_list" onmouseover="count()">
                                                <div class="col-md-8">
                                                    <div class="table">
                                                        <br>
                                                        <h5 class="card-title">Verifier d'abord que vous avez imprimer </h5>
                                                        <small>Revenez sur la page</small>
                                                        <button class="btn btn-primary" id="reappel" disabled><i class="zmdi zmdi-light"></i>Imprimer</button>
                                                    </div>
                                                </div>
                                                <div class="body" onmouseover="count()">
                                                    <h5 class="title">VALIDEZ LES RETRAITS SI ILS SONT CORRECTS</h5>
                                                    <div class="col-7">
                                                       <table class="table table-hover m-b-0">
                                                            <thead>
                                                                <tr>
                                                                    <td>Les articles</td>
                                                                    <td>Quantite en stock</td>
                                                                    <td>Quantite retiree</td>
                                                                    <td>Quantite Restante en stock</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $allProduct = json_decode(($facture_livraison->allProduct), true);
                                                            @endphp

                                                                    @for ($increment = 0; $increment < count($allProduct); $increment++)
                                                                    @php
                                                                        $quantitestock = DB::select('select quantity from stock_agence_A where title = "'.$allProduct[$increment].'" ');
                                                                        foreach ($quantitestock as $key) {
                                                                            $enstock = $key->quantity;
                                                                        }
                                                                    @endphp
                                                                    <tr>
                                                                        <th>{{$allProduct[$increment]}}</th>
                                                                        <th id="enstock{{$increment}}">{{number_format($enstock)}}</th>
                                                                        <th id="qiantite_retire{{$increment}}"></th>
                                                                        <th id="qiantite_restante{{$increment}}"></th>
                                                                        <th id="it_ok{{$increment}}" style="display:none;"><button disabled aria-readonly="true" class="btn btn-success btn-sm waves-effect"><i class="zmdi zmdi-check-circle"></i></button> </th>
                                                                        <th id="it_error{{$increment}}" style="display:none;"><button disabled="disabled" class="btn btn-danger"><i class="zmdi zmdi-close"></i></button></th>
                                                                    </tr>
                                                                    @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br/>
                                                    <button id="stock_premier_submit" type="submit" onclick="" class="btn btn-block  btn-width btn-success" disabled>
                                                        <i class="fa fa-btn fa-sign-in"></i>Retirer  des stocks
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="putain">
                                    <div class="col-md-9  div_error" id="div_error">
                                        <div id="" class="alert alert-danger">
                                            <h6>Une erreur dans votre saisie </h6>
                                            <a href="" style="text-decoration:none;" class="btn btn-danger">Actualiser ici</a>
                                        </div>
                                        <span class="errormax error" id="errormax"></span>
                                        <span class="errormin error" id="errormin"></span>
                                    </div>
                                    <div class="form-group">
                                        <br/>
                                        <a style="text-decoration:none;color:#fff !important;" id="">
                                            <a id="premier_stock" class="btn btn-width btn-success" onclick="popup()" style="text-decoration:none;color:#fff !important;">
                                                <i class="fa fa-btn fa-sign-in"></i>Retirer  des stocks
                                            </a>
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <br/>
                                        <a type="" class="btn btn-primary" onclick="printF()" id="imprimt" style="text-decoration:none;color:#fff !important;">
                                            <i class="fa fa-btn fa-sign-in"></i>Imprimer
                                        </a>
                                        <a href="/Magasin_agence_A" class="btn btn-danger">
                                            <i class="zmdi zmdi-assignment-return"></i> <span>   Cancel</span>
                                        </a>
                                        <button class="btn btn-danger" type="reset" id="probleme">UN PROBLEME DANS LES VALEURS</button>
                                    </div>
                                </div>
                            </form>
                        <div id="putain2">
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
                                function popup() {
                                    document.getElementById("loginPopup").style.display="block";
                                    var lengt = document.getElementById('countable').value;
                                    for (let arriv = 0; arriv < lengt; arriv++) {
                                        document.getElementById('qiantite_retire'+arriv).innerHTML = parseInt(document.getElementById('retire'+arriv).value);
                                        document.getElementById('qiantite_restante'+arriv).innerHTML = parseInt(document.getElementById('enstock'+arriv).innerHTML) - parseInt(document.getElementById('retire'+arriv).value);
                                        if (parseInt(document.getElementById('qiantite_restante'+arriv).innerHTML) < 0) {
                                            document.getElementById("it_ok"+arriv).style.display="none";
                                            document.getElementById("it_error"+arriv).style.display="initial";
                                            dibled.setAttribute("disabled");
                                        } else {
                                            document.getElementById("it_ok"+arriv).style.display="initial";
                                            document.getElementById("it_error"+arriv).style.display="none";
                                        }
                                    }
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
                            <script>
                                var dibled = document.getElementById("stock_premier_submit");
                            </script>
                            <script>
                                function calcul_bill() {
                                    <?php
                                            $php_array = $total_facture;
                                            $code_array = json_encode($php_array);
                                    ?>
                                    var array = <?php echo $code_array; ?>;
                                    var total_facture_definitif3 = <?php echo $total_facture; ?>;
                                    let total_facture_definitif = 0;

                                    for (let index = 0; index < array.length; index++) {
                                        //const element = array[index];
                                        document.getElementById('total_produit_facture'+index).innerHTML = document.getElementById('price_min_facture'+index).value * document.getElementById('quantity_facture'+index).value;
                                        var total_facture = [];
                                        total_facture.length = index;
                                        total_facture[index] = document.getElementById('total_produit_facture'+index).innerHTML;
                                        total_facture_definitif += parseInt(total_facture[index]);
                                        document.getElementById('total_facture').innerHTML = total_facture_definitif.toLocaleString();
                                    }
                                    //var price0 = document.getElementById('price_min_facture0').value;
                                    //document.getElementById('total_produit_facture0').innerHTML = price0;
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
                                        document.getElementById('total-letter').innerHTML = NumberToLetter(total_facture_definitif3);

                                    }
                                    test();
                                    function disp(inx) {
                                        document.getElementById("premier_stock").style.display="none";
                                        document.getElementById("imprimt").style.display="none";
                                        document.getElementById("premier_stock").style.display="none";
                                        document.getElementById("div_error").style.display="initial";
                                    }
                                    function look(inx) {
                                        document.getElementById("stocks").style.display="initial";
                                        document.getElementById("probleme").style.display="none";
                                    }
                                    <?php $php_array2 = $allQuantityCommande; $code_array2 = json_encode($php_array2);?>
                                    function restants() {
                                        var array2 = <?php echo $code_array2; ?>;
                                        for (let index = 0; index < array2.length; index++) {
                                            if (parseInt(document.getElementById('retire'+index).value) <= parseInt(document.getElementById('quantity_facture'+index).value)) {
                                                document.getElementById('restante'+index).innerHTML = (parseInt(document.getElementById('quantity_facture'+index).value) - parseInt(document.getElementById('retire'+index).value));
                                                document.getElementById("premier_stock").style.display="initial";
                                                document.getElementById("imprimt").style.display="initial";
                                                document.getElementById("div_error").style.display="none";
                                                dibled.removeAttribute("disabled");
                                            }
                                            if (parseInt(document.getElementById('retire'+index).value) > parseInt(document.getElementById('quantity_facture'+index).value)) {
                                                document.getElementById('restante'+index).innerHTML = (parseInt(document.getElementById('quantity_facture'+index).value) - parseInt(document.getElementById('retire'+index).value));
                                                disp(index);
                                                dibled.setAttribute("disabled");
                                            }
                                            if (parseInt(document.getElementById('restante'+index).innerHTML) < 0) {
                                                //document.getElementById("div_error").style.display="initial";
                                                document.getElementById("premier_stock").style.display="none";
                                                disp(index);
                                            }

                                        }
                                    }
                                    restants();

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

