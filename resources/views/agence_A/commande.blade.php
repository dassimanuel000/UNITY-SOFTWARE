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
        color: #fff;
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
<script>
    window.onload = function(event) {
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
                                <li>Tél : +(237) 677 53 78 95</li>
                                <li>Identifiant Facture: {{ Auth::user()->initial_agence }}{{ time() }}</li>
                            </div>
                            <div class="div-center">
                                <li>Doit :</li>
                                <li><span class="span_command" style="text-transform: uppercase;">{{ $client_agence_A->name_client }}</span></li>
                                <input type="hidden" name="idClient1" id="idClient1" value="{{ $client_agence_A->id_client }}"/>
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
                                        $facture = DB::select('select * from facture');
                                    @endphp

                                    @foreach ($facture as $item)
                                        <form action="/update_facture/{{$item->idFacture}}" method="PUT">
                                            <tr>
                                                <th>{{$i}}</th>
                                                <th>{{$item->nameProduct}}</th>'
                                                <th><input name="taxe_product" id="quantity_facture{{$i}}" type="text" class="input-disappear" value="{{$item->taxeProduct}}" min="1"/></th>
                                                <input name="prix_min" id="prix_min{{$i}}" type="hidden" class="input-disap" value="{{$item->priceMinProduct}}" min="1"/>
                                                <th><input name="price_min_facture" id="price_min_facture{{$i}}" type="text" class="input-disappear" min="{{$item->priceMinProduct}}" value="{{$item->priceMinProduct}}" max="{{$item->priceMaxProduct}}" onkeyup="if(parseInt(this.value)>{{$item->priceMaxProduct}}){ this.value ={{$item->priceMinProduct}}; return false; }" required/></th>
                                                <th class="th_hover">Prix Maximun <button name="price_max_facture" id="price_max_facture{{$i}}" class="btn btn-danger" disabled>{{$item->priceMaxProduct}}</button></th>
                                                <th id="total_produit_facture{{$i}}"></th>
                                                <th class="th_hover"><div style="max-width: 45% !important;float:left;font-size:12px;"><small>Validez <br> ainsi</small></div><button id="btn_facture{{$i}}" type="submit" class="btn btn-success btn-sm waves-effect"><i class="zmdi zmdi-check-circle"></i></button></th>
                                            </tr>
                                        </form>
                                        @php
                                            $i++;
                                            $t += $item->priceMinProduct;
                                        @endphp
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td colspan="3" align="right"> Total : </td>
                                            <td id="total_facture" colspan="3">
                                                @php
                                                $total_facture = DB::select('select priceMinProduct from facture');
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
                                <div class="sl-content" style="color:rgb(19, 14, 14) !important;width:auto;height:auto;margin-left:10%">
                                    <small>N° de contribuable : P087000147362M.</small>
                                    <small><strong>Email:</strong> uniteconstruction@gmail.com</small><br>
                                    <small>UNITE CONSTRUCTION, société de commercialisation des matériaux de construction et pièces détachées.</small>
                                </div>
                            </div>
                        </div>
                        <div id="putain">
                            <div class="errorfacture alert alert-danger" id="errorfacture"></div>
                            <div class="col-md-9 alert alert-danger div_error" id="div_error">
                                <span class="errormax error" id="errormax"></span>
                                <br>
                                <br>
                                <span class="errormin error" id="errormin"></span>
                            </div>
                            <div class="form-group row">
                                <br/>
                                <div class="col-md-7">
                                    <form action="{{ Route('change_state.change_state') }}" onsubmit="printF()" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" id="form_add_family">
                                        {{ csrf_field() }}
                                        <div class="col-md-10 col-md-offset-4">
                                            <input type="hidden" name="identifiant" value="{{ Auth::user()->initial_agence }}{{ time() }}">
                                            <input type="hidden" name="price_int" value=" {{ $t}} ">
                                            <button id="print-button" type="submit" class="btn btn-width btn-success">
                                                <i class="fa fa-btn fa-sign-in"></i>Envoyer la commande au magazinier
                                            </button>
                                        </div>
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
                                <div class="col-md-4" id="count">
                                    <b>La somme deja dans le compte</b>
                                    <button class="btn btn-defaut" id="account_client">
                                        {{ $client_agence_A->account_client }}
                                    </button>
                                </div>
                                <div class="col-md-6" id="count">
                                    <button class="btn btn-white" style="border: 2px solid darkgrey" id="account_client" onclick="popup()">
                                        ajoutez Directement la somme dans le compte du client {{ $client_agence_A->name_client }}
                                    </button>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <h2>Selectionner les articles</h2>
                            <br/>
                            <div class="card" onmouseover="id_Client()">
                                <div class="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="search" name="search" value="" placeholder="Search.." onclick="id_Client()"/>
                                        <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" onmouseover="id_Client()">
                                <div class="row clearfix" id="tbody">

                                </div>
                            </div>
                            <script type="text/javascript">
                                const search = document.getElementById('search');
                                const tableBody = document.getElementById('tbody');
                                function getContent(){

                                const searchValue = search.value;

                                    const xhr = new XMLHttpRequest();
                                    xhr.open('GET','{{route('search_client')}}/?search=' + searchValue ,true);
                                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                    xhr.onreadystatechange = function() {

                                        if(xhr.readyState == 4 && xhr.status == 200)
                                        {
                                            tableBody.innerHTML = xhr.responseText;
                                        }
                                    }
                                    xhr.send()
                                }
                                search.addEventListener('input',getContent);
                            </script>
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
                                function commande() {
                                    //alert('a');
                                }
                            </script>
                            <script>
                                function idClient() {
                                    if ((document.getElementById('idClient1').value) != null) {
                                        document.getElementById('idClient').value = document.getElementById('idClient1').value;
                                    } else {
                                        return null;
                                    }
                                    document.getElementById('idClient').value = document.getElementById('idClient1').value;
                                }
                                function error() {
                                    throw new Error('Soit vous ajoutez dans le comte soit vous annulez la commande!');
                                }
                                function count() {
                                    var account_client = parseFloat(document.getElementById('account_client_update').value);
                                    var counten = parseInt(document.getElementById('countel').innerHTML);
                                    var end = account_client + counten;
                                    document.getElementById('last_compte').innerHTML = end.toLocaleString();
                                }
                            </script>
                            <script>
                                function calcul_bill() {
                                    <?php
                                            $php_array = $total_facture;
                                            $code_array = json_encode($php_array);
                                    ?>
                                    var array = <?php echo $code_array; ?>;
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
                                    var compte = parseInt(document.getElementById('account_client').innerHTML);
                                    if (compte < total_facture_definitif) {
                                        var errorfacture = "Le prix de facture est superieur a la somme dans le compte. Veuillez appuyer ok et puis annuler la facture";
                                        document.getElementById('errorfacture').innerHTML = errorfacture;
                                        document.getElementById('imprimt').style.display = 'none';
                                        document.getElementById('print-button').style.display = "none";
                                        document.getElementById('errorfacture').style.display = 'initial';
                                        //document.getElementById('div_error').style.display="initial";
                                        dispar();
                                    }else{
                                        document.getElementById('imprimt').style.display = "initial";
                                        document.getElementById('print-button').style.display = "initial";
                                        document.getElementById('errorfacture').style.display = 'none';
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
                                        document.getElementById('total-letter').innerHTML = NumberToLetter(total_facture_definitif);
                                        document.getElementById('account_client').style.display = "initial";

                                        var total_fact = parseInt(document.getElementById('total_facture').innerHTML);

                                        for (let index = 0; index < array.length; index++) {
                                            if (parseInt(document.getElementById('price_min_facture'+index).value) > parseInt(document.getElementById('price_max_facture'+index).innerHTML)) {
                                                var errormax = "le prix que vous avez saisi est superieur au prix maximun de cet article veuillez moodifier ou annuler la facture";
                                                document.getElementById('errormax').innerHTML = errormax;
                                                document.getElementById('errormin').innerHTML = '';
                                                document.getElementById('imprimt').style.display = 'none';
                                                document.getElementById('print-button').style.display = 'none';
                                                document.getElementById('div_error').style.display="initial";
                                                document.getElementById('btn_facture'+index).style.display="none";
                                            }else if(parseInt(document.getElementById('price_min_facture'+index).value) < parseInt(document.getElementById('prix_min'+index).value)){
                                                var errormin = "le prix que vous avez saisi est inferieur au prix minimun de cet article veuillez moodifier ou annuler la facture";
                                                document.getElementById('errormin').innerHTML = errormin;
                                                document.getElementById('errormax').innerHTML = '';
                                                document.getElementById('imprimt').style.display = 'none';
                                                document.getElementById('print-button').style.display = 'none';
                                                document.getElementById('div_error').style.display="initial";
                                                document.getElementById('btn_facture'+index).style.display="none";
                                            }else{
                                                document.getElementById('div_error').style.display = 'none';
                                                document.getElementById('btn_facture'+index).style.display="initial";
                                            }
                                        }
                                    }
                                    test();
                                    commande();

                                }
                            </script>
                            <script>
                                function id_Client() {
                                    var array = <?php echo $inx; ?>;

                                    for (let index = 0; index < 30; index++) {

                                        document.getElementById('idClient'+index).value = document.getElementById('idClient1').value;

                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                            <form action="/account_commande_update/{{ $client_agence_A->id_client}}" method="get">
                                                <label for="account" style="color:white;">LA SOMME AJOUTEE DU COMPTE</label>
                                                <div class="form-group">
                                                    <input type="text" name="account_client_update" id="account_client_update" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                    <span class="small btn btn-white btn-sm waves-effect">XAF</span>
                                                </div>
                                            <span class="period"></span>
                                        </div>
                                        <ul class="list" style="margin-left: 10%;">
                                            <li class="active textU ">LA  SOMME DEJA DANS LE COMPTE</li>
                                            <button disabled style="width:90%;" class="btn btn-primary" id="countel">{{$client_agence_A->account_client}}</button>
                                            <li class="active textU">LA NOUVELLE SOMME DU COMPTE</li>
                                            <button type="reset" style="width:90%;" class="btn btn-primary" id="last_compte">{{$client_agence_A->account_client}}</button>
                                        </ul>
                                            <button type="submit" class="btn-hover btn-success button">VALIDER AINSI</button>
                                        </form>
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
    </div>
</body>
</html>

