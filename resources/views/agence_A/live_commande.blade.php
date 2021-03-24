@extends('agence_A.agence_A')
@section('content')
@php
                    $facture = DB::select('select * from facture');
                    $i = 0;
                    $t = 0;
                @endphp
<section class="content ecommerce-page" onmouseover="tot()">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Commandes
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Commandes</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            @if (session('error'))
            <script>
                function name() {
                    swal("Probleme !", "You clicked the button!", {
                        icon : "error",
                        buttons: {
                            confirm: {
                                className : 'btn btn-danger'
                            }
                        },
                    });
                }
            </script>
            @endif
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card product_item_list">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="panel-body center">
                                <center>
                                    <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle center m-b img-responsive" width="90" alt="User"/>
                                </center>
                                <br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> Les identifiants du client</th>
                                            </table>
                                        </center>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('form_client_commande') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">Nom du Client</label>
                                            <div class="col-md-12">
                                                <input id="name_client" type="text" class="form-control" name="name_client" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">Adresse du Client</label>
                                            <div class="col-md-12">
                                                <input id="adress_client" type="text" class="form-control" name="adress_client" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">telephone du Client</label>
                                            <div class="col-md-12">
                                                <input id="telephone_client" type="tel" class="form-control" name="telephone_client" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">entreprise du Client</label>
                                            <div class="col-md-12">
                                                <input id="entreprise_client" type="text" class="form-control" name="entreprise_client" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 control-label">Montant du Compte Client</label>
                                            <div class="col-md-12">
                                                <input id="account_client" type="number" class="form-control" name="account_client" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" id="male" name="sexe_client" value="male" required>
                                            <label for="male">Male</label><br>
                                            <input type="radio" id="female" name="sexe_client" value="female" required>
                                            <label for="female">Female</label><br>
                                        </div>
                                        <div class="col-md-12 col-md-offset-4">
                                            @if ($facture)

                                            <button type="submit" class="btn btn-success btn-block waves-effect btn-lg btn-md">
                                                <i class="fa fa-btn fa-sign-in"></i>Ajouter
                                            </button>
                                            @else

                                            <a aria-disabled="true" class="btn btn-defaut btn-block waves-effect btn-lg btn-md">
                                                <i class="fa fa-btn fa-sign-in"></i>Rien dans la facture
                                            </a>
                                            @endif
                                        </div>
                                    </form>
                                    <a href="{{Route('delete_facture')}}">
                                        <button class="btn btn-danger btn-lg btn-md">
                                            <i class="fa fa-btn fa-sign"></i>Cancel
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
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
                                    <th class="quantity-small-td" data-breakpoints="quantity-small-td">Quantit&eacute; Command&eacute;</th>
                                    <th>Prix Unitaire</th>
                                    <th data-breakpoints="cs">Prix Total</th>
                                </tr>
                                </thead>
                                <tbody class="body_table" id="shopping_cart" onmouseover="calcul_bill()">
                                    @foreach ($facture as $item)
                                        <tr>
                                            <th>{{$i}}</th>
                                            <th>{{$item->nameProduct}}</th>'
                                            <th><input name="taxe_product" id="quantity_facture{{$i}}" type="text" class="input_none" value="{{$item->taxeProduct}}" readonly style="color: black" min="1"/></th>
                                            <th class="input-disappear">{{$item->priceMinProduct}}</th>
                                            <th id="total_produit_facture{{$i}}">{{($item->priceMinProduct)*($item->taxeProduct)}}</th>
                                        </tr>
                                        @php
                                            $i++;
                                            $t += ($item->priceMinProduct)*($item->taxeProduct);
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
                                                {{number_format($t)}}
                                            </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                <div class="card product_item_list">
                    <div class="body">
                        <h5>Choississez les produits</h5>
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

            <div id="loginPopup" onmouseover="tot()">
                <div class="form-popup" id="popupForm" style="background:#fff">
                    <section class="banner_area">
                        <div class="container" id="popup_product">

                        </div>
                    </section>
                </div>
            </div>
            <div class="hr">
                <hr/>
            </div>
            <div class="col-md-7">
                <a href="{{Route('delete_facture')}}">
                    <button class="btn btn-danger">
                        <i class="fa fa-btn fa-sign"></i>Cancel
                    </button>
                </a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const search = document.getElementById('search');
        const tableBody = document.getElementById('tbody');
        function getContent(){

        const searchValue = search.value;

            const xhr = new XMLHttpRequest();
            xhr.open('GET','{{route('search_live_commande')}}/?search=' + searchValue ,true);
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
        function openForm(id) {

            const _id = id;

            const xhr = new XMLHttpRequest();
            xhr.open('GET','{{route('_id_add_popup')}}/?id=' + _id ,true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {

                if(xhr.readyState == 4 && xhr.status == 200)
                {
                    popup_product.innerHTML = xhr.responseText;
                }
            }
            xhr.send()
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
        if (price_min_product < 2) {
            if(confirm('LE PRODUIT N`EST PAS EN STOCK') == true){ return true; } else {return false}
        }
        var taxe_product = document.getElementById('taxe_product').value;
        document.getElementById('total1').innerHTML = price_min_product * taxe_product;
    }
</script>
</section>
@endsection
