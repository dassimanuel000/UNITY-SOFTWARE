@extends('agence_A.agence_A')
@section('content')
<link rel="stylesheet" href="{{asset('jss/swiper.min.css')}}">
<script src="{{asset('jss/swiper.min.js')}}"></script>
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Depots de Capitaux dans l'entreprise
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Depots </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            @if (session('erreurs'))
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <div class="alert alert-danger" role="alert">
                                {{ session('erreurs') }}
                                Le produit est deja envoy&eacute;
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('resend_stock'))
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <div class="alert alert-success" role="alert">
                                {{ session('resend_stock') }}
                                Le produit a est envoy&eacute;
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('remove_stock'))
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <div class="alert alert-success" role="alert">
                                {{ session('remove_stock') }}
                                Le produit a est enlev&eacute;
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @php
                $last_stock = DB::select('select * from stock_agence_B where correct = 1');
            @endphp
            @if ($last_stock)
                <div class="col-12 col-md-12 col-lg-12 col-sm-12">
                    <div class="card product_item_list">
                        <div class="body table-responsive shadow">
                            <div class="alert-danger alert col-bold bold">
                                <b>
                                    LES PRODUITS SUIVANTS N'ONT PAS CORRECTEMENENT ETE LIVREE A L'AGENCE B <br>VEUILLEZ VERIFIER LE STOCK ACHEMINE VERS CETTE AGENCE
                                </b>
                            </div>
                            <div class="table-responsive responsive">
                                <table id="DataTable" class="table responsive table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th data-breakpoints="sm xs">Image</th>
                                            <th data-breakpoints="sm xs">Nom produit</th>
                                            <th data-breakpoints="sm xs">Prix min</th>
                                            <th data-breakpoints="sm xs">Quantite Envoy&eacute;e</th>
                                            <th data-breakpoints="sm xs">RENVOYER</th>
                                            <th data-breakpoints="sm xs">ANNULER L'APPROVISIONNEMENT</th>
                                        </tr>
                                    </thead>
                                    <div class="table-responsive responsive">
                                        <tbody id='tbody'>
                                            @foreach ($last_stock as $item)
                                            <tr>
                                                <td><img src="../uploads/stock_agence_A/{{$item->image}}" alt="image produit" class="img-responsive responsive" height="60px" srcset=""></td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->price_min}}</td>
                                                <td> <button class="btn btn-white btn-md col-black text-title title "> {{$item->quantity}}</button> </td>
                                                <td>
                                                    <form action="/form_resend_stock/{{ $item->id }}" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        <input type="hidden" name="quantity_update" id="quantity_update" readonly required value="{{ $item->quantity }}">
                                                        <input type="hidden" name="update_id" id="update_id" readonly required value="{{ $item->id_mere }}">
                                                        <div class="nonen none" style="display: none;">
                                                            <input type="hidden" name="update_id_emp" value="{{ Auth::user()->id }}" required readonly>
                                                            <input type="hidden" name="update_name_emp" value="{{ Auth::user()->name }}" required readonly>
                                                            <input type="hidden" name="update_referent" value="{{ $item->referent }}" readonly>
                                                            <input type="hidden" name="update_title" value="{{ $item->title }}" readonly>
                                                            <input type="hidden" name="update_price_min" value="{{ $item->price_min }}" readonly>
                                                            <input type="hidden" name="update_price_max" value="{{ $item->price_max }}" readonly>
                                                            <input type="hidden" name="update_price_achat" value="{{ $item->price_achat }}" readonly>
                                                            <input type="hidden" name="update_quantity" value="{{ $item->quantity }}" readonly>
                                                            <input type="hidden" name="update_image" value="{{ $item->image }}" readonly>
                                                        </div>
                                                        <button type="submit" class="btn btn-success btn-block btn-effect"><i class="zmdi zmdi-check-circle"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="/form_remove_stock/{{ $item->id }}" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        <button class="btn btn-danger btn-block btn-effect"><i class="zmdi zmdi-close"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card product_item_list">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="panel-body center">
                                <center>
                                    <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle center m-b img-responsive" width="" alt="User"/>
                                </center>
                                <br><br><br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> Distribuer les produits des Agences d'United Construction</th>
                                            </table>
                                        </center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="card product_item_list shadow">
                    @php
                    $facture = DB::select('select * from stock_dispatch');
                    $i = 0;
                    $t = 0;
                @endphp
                @if ($facture)
                <div class="card product_item_list">
                    <div class="body">
                        <h5>Visualisation de la facture</h5>
                        <div style="color:#fff !important;width:auto;height:auto;"><br>
                        <div class="table-responsive responsive">
                        </div>
                            <table id="DataTable" class="table responsive table-hover m-b-0">
                                <thead class="body_table2">
                                <tr>
                                    <th class="xs-small" data-breakpoints=" xs">N.</th>
                                    <th>D&eacute;signation</th>
                                    <th class="quantity-small-td" data-breakpoints="quantity-small-td">Quantit&eacute; Envoye&eacute;</th>
                                    <th>Prix Unitaire</th>
                                    <th data-breakpoints="cs">Prix Total</th>
                                </tr>
                                </thead>
                                <tbody class="body_table" id="shopping_cart" onmouseover="calcul_bill()">
                                    @foreach ($facture as $item)
                                        <tr>
                                            <th>{{$i}}</th>
                                            <th>{{$item->title}}</th>'
                                            <th><input name="taxe_product" id="quantity_facture{{$i}}" type="text" class="input_none" value="{{$item->quantity}}" readonly style="color: black" min="1"/></th>
                                            <th class="input-disappear">{{number_format($item->price_min)}}</th>
                                            <th id="total_produit_facture{{$i}}">{{number_format(($item->price_min)*($item->quantity))}}</th>
                                        </tr>
                                        @php
                                            $i++;
                                            $t += ($item->price_min)*($item->quantity);
                                        @endphp
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td colspan="3" align="right"> Total : </td>
                                            <td id="total_facture" colspan="3">
                                                @php
                                                //$total_facture = DB::select('select price_min from facture');
                                                @endphp
                                                {{number_format($t)}}
                                            </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <center>
                            <form action="/insert_stock" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="id_emp" value="{{ Auth::user()->id }}" required readonly>
                                <input type="hidden" name="name_emp" value="{{ Auth::user()->name }}" required readonly>
                                <button class="btn-lg btn btn-success btn-block waves " style="color: #fff"><b>TOUT T'ENVOYER A L'AGENCE B</b></button>
                            </form>
                        </center>
                    </div>
                </div>
                @endif
                    <div class="body table-responsive ">
                        <h5>Choississez Les Produits</h5>
                        <div class="form-group">
                            <ul style="list-style: none;">
                                <li class="hidden-sm-down">
                                    <div class="input-group">
                                            <input type="text" class="form-control" id="search" name="search" value=""  placeholder="Search...">
                                        <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="table-responsive responsive">
                            <table id="DataTable" class="table responsive table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th data-breakpoints="sm xs">Image</th>
                                        <th data-breakpoints="sm xs">Nom produit</th>
                                        <th data-breakpoints="sm xs">Prix min</th>
                                        <th data-breakpoints="sm xs">Quantite en stock</th>
                                        <th data-breakpoints="sm xs">Action</th>
                                    </tr>
                                </thead>
                                <div class="table-responsive responsive">
                                    <tbody id='tbody'>

                                    </tbody>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <a href="{{Route('delete_stock')}}">
            <button class="btn btn-danger">
                <i class="fa fa-btn fa-sign"></i>Cancel
            </button>
        </a>
    </div>
</section>
<script type="text/javascript">
    const search = document.getElementById('search');
    const tableBody = document.getElementById('tbody');
    function getContent(){

    const searchValue = search.value;

        const xhr = new XMLHttpRequest();
        xhr.open('GET','{{route('search_dispatch')}}/?search=' + searchValue ,true);
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
<script>
function tot() {
    var price_min_product = document.getElementById('price_min_product').value;
    var taxe_product = document.getElementById('taxe_product').value;
    var results = price_min_product * taxe_product;
    /***
    replace(/(\d{3})/g, '$1 ').trim();*/
    document.getElementById('total1').innerHTML = results.toLocaleString();
    document.getElementById('quantiti1').innerHTML = document.getElementById('taxe_product').value;
}
</script>
@endsection
