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
            <div class="col-lg-11">
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
                                <li>T??l : +(237) 677 53 78 95</li>
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
                            <form action="/facture_livraision_definitif_edit/{{$facture_livraison->idfactureprint}}" method="get">
                                <div class="div-center">
                                    <li>Doit :</li>
                                    <li><span class="span_command" style="text-transform: uppercase;">{{ $facture_livraison->nameClient }}</span></li>

                                </div>
                                <table id="DataTable" class="table table-hover m-b-0">
                                    <thead>
                                    <tr>
                                        <th class="xs-small" data-breakpoints=" xs">N.</th>
                                        <th>D&eacute;signation</th>
                                        <th class="quantity-small-td" data-breakpoints="quantity-small-td">Quantit&eacute; Command&eacute;</th>
                                        <th>Quantit&eacute; d&eacute;j&acirc; retir&eacute;e</th>
                                        <th>Quantit&eacute; restante</th>
                                        <th> |   </th>
                                        <th>Quantit&eacute; a Livrer</th>
                                        <th> |   </th>
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
                                            $allProduct = json_decode($allProduct);

                                            $allQuantityCommande = json_decode(($facture_livraison->allQuantityCommande), true);
                                            $allQuantityCommande = json_decode(($allQuantityCommande), true);

                                            $allPriceUnitaire = json_decode(($facture_livraison->allPriceUnitaire), true);
                                            $allPriceUnitaire = json_decode($allPriceUnitaire);

                                            $allPriceTotal = json_decode(($facture_livraison->allPriceTotal), true);
                                            $allPriceTotal = json_decode($allPriceTotal);

                                            $allQuantityRetire = json_decode(($facture_livraison->allQuantityRetire), true);


                                            for ($index=0; $index < count($allQuantityRetire); $index++) {

                                                $maxi=$allQuantityCommande[$index]-$allQuantityRetire[$index];
                                            echo '<tr>'
                                                .'<th>'.$i.'</th>'
                                                .'<th>'.$allProduct[$index].'</th>'
                                                .'<th>'.'<input type="text" id="quantity_facture'.$i.'" value="'.$allQuantityCommande[$index].'" class="input-disap" readonly/></th>'
                                                .'<input id="maximum'.$i.'" type="hidden" value="'.$allQuantityRetire[$index].'"/>'
                                                .'<th>'.'<input id="vrai_retire'.$i.'" type="hidden" value="'.$allQuantityRetire[$index].'" readonly /> <input type="hidden" name="dernier_retire'.$i.'" id="dernier_retire'.$i.'" value="'.$allQuantityRetire[$index].'" readonly /> <input name="deja_retire'.$i.'" id="deja_retire'.$i.'" type="text" class="input-disap" readonly value="'.$allQuantityRetire[$index].'" max="'.$allQuantityCommande[$index].'" onkeyup="if(parseInt(this.value)>'.$allQuantityCommande[$index].'){ this.value ='.$allQuantityRetire[$index].'; return false; }" required/>'.'</th>'
                                                .'<th>'.'<input id="vrai_reste'.$i.'" class="input-disap" type="text" value="'.($allQuantityCommande[$index] - $allQuantityRetire[$index]).'"/> <span name="restante" id="restante'.$i.'" style="display: none;" class="input-disap" value=""/>'.'</span>'.'</th>'
                                                .'<th>'.'|'.'</th>'
                                                .'<th>'.'<input name="retire'.$i.'" id="retire'.$i.'" type="text" class="input-disappear" value="0" max="'.$maxi.'" onkeyup="if(parseInt(this.value)>'.$maxi.'){ this.value ='.$maxi.'; return false; }" required/>'.'</th>'
                                                .'<th>'.'|'.'</th>'
                                                .'<th id="total_produit_factures'.$i.'">'.$allPriceUnitaire[$index].'</th>'
                                                .'<th>'.$allPriceTotal[$index].'</th>'
                                            .'</tr>'
                                            .'</form>';
                                            $i++;
                                            $count += $index;

                                    }
                                        @endphp
                                        <input type="hidden" name="count" value="<?php echo $i;?>">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <td colspan="6" align="right"> Total : </td>
                                            <td id="total_facture" colspan="4">
                                                @php
                                                $total_facture = $facture_livraison->totalFacture;
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
                                            Cette commande s?????l??ve ?? la somme de    <span style="text-transform:uppercase;font-weight:800" id="total-letter">..................................................................</span>  Francs CFA
                                        </div>
                                        @if ($allQuantityRetire > 0)
                                        <bdi>Dernier Retrait qui date du : {{ $facture_livraison->updated_at}}</bdi>
                                        @endif
                                        <br>
                                        <table class="table table-hover m-b-0">
                                            <tr>
                                                <th>Signature Vendeur</th>
                                                <th>R??glement</th>
                                                <th>Signature client</th>
                                            </tr>
                                            <tr>
                                                <td rowspan="2"><br><br></td>
                                                <td rowspan="2">Modalit?? de r??glement<br></td>
                                                <td rowspan="2"><br><br></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="sl-content" style="color:#000 !important;width:auto;height:auto;margin-left:10%">
                                        <small>N?? de contribuable : P087000147362M.</small>
                                        <small><strong>Email:</strong> uniteconstruction@gmail.com</small><br>
                                        <small>UNITE CONSTRUCTION, soci??t?? de commercialisation des mat??riaux de construction et pi??ces d??tach??es.</small>
                                    </div>
                                </div>
                                <div id="loginPopup" onmouseover="count()">
                                    <div class="form-popup" id="popupForm" style="background:#fff;width:auto;" onmouseover="count()">
                                        <div class="" onmouseover="count()" style="background:#fff;width:850px;margin-left:-50%;">
                                            <div class="card product_item_list" onmouseover="count()">
                                                <div class="col-md-8">
                                                    <div class="table">
                                                        <br>
                                                        <h5 class="card-title">Verifier d'abord que vous avez imprimer </h5>
                                                        <small>Revenez sur la page</small>
                                                        <button disabled class="btn btn-primary"><i class="zmdi zmdi-light"></i>Imprimer</button>
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
                                                                    <td>Quantite retir&eacute;e</td>
                                                                    <td>Quantite Restante en stock</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $allProduct2 = json_decode(($facture_livraison->allProduct), true);
                                                                $allProduct2 = json_decode($allProduct2);
                                                            @endphp

                                                                    @for ($increment = 0; $increment < count($allProduct2); $increment++)
                                                                    @php
                                                                        $quantitestock = DB::select('select quantity from stock_agence_A where title = "'.$allProduct2[$increment].'" ');
                                                                        foreach ($quantitestock as $key) {
                                                                            $enstock = $key->quantity;
                                                                        }
                                                                    @endphp
                                                                    <tr>
                                                                        <th>{{$allProduct2[$increment]}}</th>
                                                                        <th id="enstock{{$increment}}">{{number_format($enstock)}}</th>
                                                                        <th> <input type="text" class="input-disap" readonly name="qiantite_retire{{$increment}}" id="qiantite_retire{{$increment}}"/> </th>
                                                                        <th name="qiantite_restante{{$increment}}" id="qiantite_restante{{$increment}}"></th>
                                                                        <th id="it_ok{{$increment}}" style="display:none;"><button disabled aria-readonly="true" class="btn btn-success btn-sm waves-effect"><i class="zmdi zmdi-check-circle"></i></button> </th>
                                                                        <th id="it_error{{$increment}}" style="display:none;"><button disabled="disabled" class="btn btn-danger"><i class="zmdi zmdi-close"></i></button></th>
                                                                    </tr>
                                                                    @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <button id="print-button" type="submit" class="btn btn-width btn-success" onclick="popup()" >
                                                        <i class="fa fa-btn fa-sign-in"></i>Retirer  des stocks
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="putain">
                                    <div class="col-md-9  div_error alert alert-danger" id="div_error">
                                        alert
                                    </div>
                                    <br/>
                                        <a type="" class="btn btn-primary btn-block " onclick="printF()" id="imprimt" style="text-decoration:none;color:#fff !important;">
                                            <i class="fa fa-btn fa-sign-in"></i>IMPRIMER D'ABORD
                                        </a>
                                    <div class="form-group">
                                        <br/>
                                        <a type="javascript:void()" class="btn btn-width btn-success" id="stocks" onclick="popup()" style="text-decoration:none;color:#fff !important;">
                                            <i class="fa fa-btn fa-sign-in"></i>Retirer  des stocks
                                        </a>
                                    </div>
                                    <div class="form-group">

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
                                            case 0: unite = "z??ro";		break;
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

                                            if(  nombre.toString().replace( / /gi, "" ).length > 15  )	return "d??passement de capacit??";
                                            if(  isNaN(nombre.toString().replace( / /gi, "" ))  )		return "Nombre non valide";

                                            nb = parseFloat(nombre.toString().replace( / /gi, "" ));
                                            if(  Math.ceil(nb) != nb  )	return  "Nombre avec virgule non g??r??.";

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
                                        document.getElementById("stocks").style.display="none";
                                        document.getElementById("probleme").style.display="initial";
                                    }
                                    function look(inx) {
                                        document.getElementById("stocks").style.display="initial";
                                        document.getElementById("probleme").style.display="none";
                                    }
                                    <?php $php_array2 = $allQuantityCommande; $code_array2 = json_encode($php_array2);?>
                                    function restants() {
                                        var array2 = <?php echo $code_array2; ?>;
                                        for (let index = 0; index < array2.length; index++) {
                                            if ((parseInt(document.getElementById('retire'+index).value)) > (parseInt(document.getElementById('quantity_facture'+index).value))) {
                                                alert((document.getElementById('retire'+index).value)+'>'+(document.getElementById('quantity_facture'+index).value));
                                                disp(index);
                                            } else {
                                                look(index);
                                            }
                                            if ((parseInt(document.getElementById('retire'+index).value)) < 1 ) {
                                                document.getElementById('retire'+index).style.display = "block";
                                            }
                                            /*if ((parseInt(document.getElementById('retire'+index).value)) < (parseInt(document.getElementById('maximum'+index).value))) {
                                                //alert((document.getElementById('retire'+index).value)+' la Quantite retire est inferieure a ce que vous pouvez encore retirer'+(document.getElementById('maximum'+index).value));
                                                var error_minimun = 'la Quantite retire est inferieure a ce que vous pouvez encore retirer';
                                                document.getElementById("div_error").innerHTML = error_minimun;
                                                document.getElementById("div_error").style.display="initial";
                                                document.getElementById("stocks").style.display="none";
                                                document.getElementById("imprimt").style.display="none";
                                            } else {
                                                document.getElementById("div_error").style.display="none";
                                                document.getElementById("imprimt").style.display="initial";
                                                look(index);
                                            }*/


                                            document.getElementById('vrai_reste'+index).value = document.getElementById('quantity_facture'+index).value - (document.getElementById('dernier_retire'+index).value) - document.getElementById('retire'+index).value;


                                            document.getElementById('restante'+index).innerHTML = document.getElementById('quantity_facture'+index).value - document.getElementById('deja_retire'+index).value;
                                            document.getElementById('restante'+index).innerHTML = document.getElementById('quantity_facture'+index).value - document.getElementById('deja_retire'+index).value;
                                            document.getElementById('qiantite_retire'+index).value = document.getElementById('retire'+index).value ;///- document.getElementById('maximum'+index).value;
                                            document.getElementById('qiantite_restante'+index).innerHTML = parseFloat(document.getElementById('enstock'+index).innerHTML) - parseFloat(document.getElementById('qiantite_retire'+index).value);
                                            document.getElementById('deja_retire'+index).innerHTML = document.getElementById('quantity_facture'+index).value - document.getElementById('retire'+index).value ;


                                            if (parseInt(document.getElementById('qiantite_restante'+index).innerHTML) < 0) {

                                                var error_facture = "la quantite en stock de l'article est errone. Annullez et refaites un nouvelle facture";
                                                document.getElementById("div_error").innerHTML = error_facture;
                                                document.getElementById("div_error").style.display="initial";
                                                document.getElementById('it_error'+index).style.display="initial";
                                                document.getElementById('it_ok'+index).style.display="none";
                                                document.getElementById('qiantite_restante'+index).classList.add("backred");
                                            } else {
                                                document.getElementById("div_error").style.display="none";
                                                document.getElementById('it_ok'+index).style.display="initial";
                                                document.getElementById('it_error'+index).style.display="none";
                                            }

                                        }
                                    }
                                    function last_func() {
                                        var array4 = <?php echo $code_array2; ?>;
                                        var disabledde = document.getElementById('print-button');
                                        for (let imp = 0; imp < array4.length; imp++) {
                                            if (parseInt(document.getElementById('qiantite_retire'+imp).innerHTML) <= 1) {
                                                alert(parseInt(document.getElementById('qiantite_retire'+imp).innerHTML));
                                            } else {
                                                return false;
                                            }
                                        }
                                    }
                                    last_func();
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

