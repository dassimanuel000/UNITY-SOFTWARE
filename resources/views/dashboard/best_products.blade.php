@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
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
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="col-md-9">
                        <div class="card product_item_list">
                            <div class="card-body">
                                <div class="body col-md-12">
                                    <div style="color:#fff !important;width:auto;height:auto;"><br>
                                        <table id="DataTable" class="table table-hover m-b-0">
                                        </div>
                                            <thead class="body_table2">
                                            <tr>
                                                <td colspan="8" align="center"> LISTES DES SORTIES DE STOCKS </td>
                                            </tr>
                                            <tr>
                                                <th class="xs-small" data-breakpoints=" xs">N.</th>
                                                <th class="xs-small" data-breakpoints=" xs">Clients</th>
                                                <th>D&eacute;signation</th>
                                                <th class="quantity-small-td" data-breakpoints="quantity-small-td">Quantit&eacute; sorties </th>
                                                <th>Prix Unitaire</th>
                                                <th data-breakpoints="cs">Prix Total</th>
                                                <th class="th_hover">Date de sorties</th>
                                            </tr>
                                            </thead>
                                            <tbody class="body_table" id="shopping_cart" onmouseover="calcul_bill()">
                                                @php
                                                    use Carbon\Carbon;
                                                    $t = 0;
                                                    $stock_out_a = DB::table('stock_out_a')->orderBy('created_at', 'ASC')->get();
                                                @endphp
                                                @foreach ($stock_out_a as $item)
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
