<!--doctype html-->
<html class="" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="Stock management template" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--STYLES
        <title>{{ config('app.name', 'Laravel') }}</title>
    -->
    <title>United Construction</title>
    <!--STYLES-->
    @include('includes.agence_A.styles')
    </head>
    @php
        $i = 0;
        $t = 0;
        use Carbon\Carbon;
    @endphp
    <style>
        .input-disappear{
            background: none;
            border: none;
            content: none;
        }
    </style>
<body class="theme-purple" onload="calcul_bill()">
    <div class="container-fluid" >
        <div class="row clearfix">
            <div class="col-lg-10">
                <div class="card product_item">
                    <div class="body">
                        <div id="print">
                            @if ($request == 0)
                                Mauvais chemin , Resultat introuvable
                            @endif
                            @if ($request == 1)
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

                            <div style="color:#fff !important;width:auto;height:auto;"><br>
                            <table id="DataTable" class="table table-hover m-b-0">
                            </div>
                                <thead class="body_table2">
                                <tr>
                                    <td colspan="8" align="center"> LISTES DES APPROVISIONNEMENTS </td>
                                </tr>
                                <tr>
                                    <th class="xs-small" data-breakpoints=" xs">N.</th>
                                    <th>Referent</th>
                                    <th>D&eacute;signation</th>
                                    <th class="quantity-small-td" data-breakpoints="quantity-small-td">Quantit&eacute; entr&eacute;e </th>
                                    <th>Prix Unitaire</th>
                                    <th data-breakpoints="cs">Prix Total</th>
                                    <th class="th_hover">Date d'approvisionnement</th>
                                </tr>
                                </thead>
                                <tbody class="body_table" id="shopping_cart" onmouseover="calcul_bill()">
                                    @php
                                        $stock_int_a = DB::table('stock_int_a')->orderBy('created_at', 'ASC')->get();
                                    @endphp
                                    @foreach ($stock_int_a as $item)
                                        <tr>
                                            <th>{{$item->id}}</th>
                                            <th>{{$item->referent}}</th>
                                            <th>{{$item->title}}</th>
                                            <th>{{number_format($item->quantity)}}</th>
                                            <th>{{number_format($item->price_min)}}</th>
                                            <th>{{number_format($item->total_int)}}</th>
                                            <th>{{ Carbon::parse($item->created_at)->diffforHumans()}}<br> Fait le :{{(date('d F Y', strtotime($item->created_at))) }}</th>
                                        </tr>
                                        @php
                                            $t += $item->total_int;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td colspan="6" align="right"> Total : </td>
                                        <td id="total_factures" style="background-color: rgb(231, 231, 231);text-align:center;font-weight:bolder" colspan="3">
                                            @php
                                            echo number_format($t);
                                            @endphp
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="sl-item" style="color:#000 !important;width:100%;height:auto;">
                                <div class="sl-content" style="color:#000 !important;width:auto;height:auto;margin-left:10%">
                                    <small>N° de contribuable : P087000147362M.</small>
                                    <small><strong>Email:</strong> uniteconstruction@gmail.com</small><br>
                                    <small>UNITE CONSTRUCTION, société de commercialisation des matériaux de construction et pièces détachées.</small>
                                </div>
                            </div>
                            @endif
                            @if ($request == 2)
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

                            <div style="color:#fff !important;width:auto;height:auto;"><br>
                            <table id="DataTable" class="table table-hover m-b-0">
                            </div>
                            <thead class="body_table2">
                                <tr>
                                    <td colspan="8" align="center"> LISTES DES SORTIES DE STOCKS </td>
                                </tr>
                                <tr>
                                    <th class="xs-small" data-breakpoints=" xs">N.</th>
                                    <th>Clients</th>
                                    <th>D&eacute;signation</th>
                                    <th class="quantity-small-td" data-breakpoints="quantity-small-td">Quantit&eacute; sorties </th>
                                    <th>Prix Unitaire</th>
                                    <th data-breakpoints="cs">Prix Total</th>
                                    <th class="th_hover">Date de sorties</th>
                                </tr>
                                </thead>
                                <tbody class="body_table" id="shopping_cart" onmouseover="calcul_bill()">
                                    @php
                                        $stock_out = DB::table('stock_out_a')->orderBy('created_at', 'ASC')->get();
                                    @endphp
                                    @foreach ($stock_out as $item)
                                        <tr>
                                            <th>{{$item->id}}</th>
                                            <th>{{$item->name_client}}</th>
                                            <th>{{$item->title}}</th>
                                            <th>{{number_format($item->quantity)}}</th>
                                            <th>{{number_format($item->price_min)}}</th>
                                            <th>{{number_format($item->total_out)}}</th>
                                            <th>{{ Carbon::parse($item->created_at)->diffforHumans()}}<br> Fait le :{{(date('d F Y', strtotime($item->created_at))) }}</th>
                                        </tr>
                                        @php
                                            $t += $item->total_out;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td colspan="6" align="right"> Total : </td>
                                        <td id="total_factures" style="background-color: rgb(231, 231, 231);text-align:center;font-weight:bolder" colspan="3">
                                            @php
                                            echo number_format($t);
                                            @endphp
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="sl-item" style="color:#000 !important;width:100%;height:auto;">
                                <div class="sl-content" style="color:#000 !important;width:auto;height:auto;margin-left:10%">
                                    <small>N° de contribuable : P087000147362M.</small>
                                    <small><strong>Email:</strong> uniteconstruction@gmail.com</small><br>
                                    <small>UNITE CONSTRUCTION, société de commercialisation des matériaux de construction et pièces détachées.</small>
                                </div>
                            </div>
                            @endif
                            @if ($request == 3)
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

                            <div style="color:#fff !important;width:auto;height:auto;"><br>
                                <table class="table">
                                </div>
                                    <thead>
                                        <tr>
                                            <td colspan="8" align="center"> LISTES DES ENTREES DE CAPITAUX </td>
                                        </tr>
                                        <tr>
                                            <th>N*</th>
                                            <th>Client  </th>
                                            <th>Motif du depot</th>
                                            <th>Prix Unitaire </th>
                                            <th>Date </th>
                                            <th>Total</th>
                                        </tr>
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

                                            @endif
                                        </td>
                                        <td>{{ number_format($item->total_int) }} <sup>XAF</sup></td>
                                        <td>
                                            {{ Carbon::parse($item->created_at)->diffforHumans() }} <br> Fait le :{{ (date('d F Y', strtotime($item->created_at)))  }}
                                        </td>
                                        <td>{{ number_format($item->total_int * $item->quantity) }} <sup>XAF</sup></td>
                                    </tr>
                                        @php
                                            $t += $item->total_int;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td colspan="4" align="right"> Total : </td>
                                        <td id="total_factures" style="background-color: rgb(231, 231, 231);text-align:center;font-weight:bolder" colspan="3">
                                            @php
                                            echo number_format($t).' <sup>XAF</sup>';
                                            @endphp
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="sl-item" style="color:#000 !important;width:100%;height:auto;">
                                <div class="sl-content" style="color:#000 !important;width:auto;height:auto;margin-left:10%">
                                    <small>N° de contribuable : P087000147362M.</small>
                                    <small><strong>Email:</strong> uniteconstruction@gmail.com</small><br>
                                    <small>UNITE CONSTRUCTION, société de commercialisation des matériaux de construction et pièces détachées.</small>
                                </div>
                            </div>
                            @endif
                            @if ($request == 4)
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

                            <div style="color:#fff !important;width:auto;height:auto;"><br>
                            <table id="DataTable" class="table table-hover m-b-0">
                            </div>
                                <thead class="body_table2">
                                <tr>
                                    <td colspan="8" align="center"> LISTES DES SORTIES D'ARGENTS | CAPITAUX</td>
                                </tr>
                                <tr>
                                    <th class="xs-small" data-breakpoints=" xs">N.</th>
                                    <th>Referent</th>
                                    <th>D&eacute;signation</th>
                                    <th class="quantity-small-td" data-breakpoints="quantity-small-td">Quantit&eacute; entr&eacute;e </th>
                                    <th>Prix Unitaire</th>
                                    <th data-breakpoints="cs">Prix Total</th>
                                    <th class="th_hover">Date de sorties</th>
                                </tr>
                                </thead>
                                <tbody class="body_table" id="shopping_cart" onmouseover="calcul_bill()">
                                    @php
                                        $cash_out_a = DB::table('cash_out_a')->orderBy('created_at', 'ASC')->get();
                                    @endphp
                                    @foreach ($cash_out_a as $item)
                                        <tr>
                                            <th>{{$item->id}}</th>
                                            <th>{{$item->referent}}</th>
                                            <th>{{$item->title}}</th>
                                            <th>{{number_format($item->quantity)}}</th>
                                            <th>{{number_format($item->price_min)}}</th>
                                            <th>{{number_format($item->total_out)}}</th>
                                            <th>{{ Carbon::parse($item->created_at)->diffforHumans()}}<br> Fait le :{{(date('d F Y', strtotime($item->created_at))) }}</th>
                                        </tr>
                                        @php
                                            $t += $item->total_out;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td colspan="6" align="right"> Total : </td>
                                        <td id="total_factures" style="background-color: rgb(231, 231, 231);text-align:center;font-weight:bolder" colspan="3">
                                            @php
                                            echo number_format($t);
                                            @endphp
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="sl-item" style="color:#000 !important;width:100%;height:auto;">
                                <div class="sl-content" style="color:#000 !important;width:auto;height:auto;margin-left:10%">
                                    <small>N° de contribuable : P087000147362M.</small>
                                    <small><strong>Email:</strong> uniteconstruction@gmail.com</small><br>
                                    <small>UNITE CONSTRUCTION, société de commercialisation des matériaux de construction et pièces détachées.</small>
                                </div>
                            </div>
                            @endif
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
