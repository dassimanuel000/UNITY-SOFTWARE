@extends('agence_A.agence_A')
@section('content')
<link rel="stylesheet" href="{{asset('css/templatemo.css')}}">
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Stocks
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Stocks</li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        function count() {
            var account_client = parseFloat(document.getElementById('account_client').value);
            var counten = parseInt(document.getElementById('counte').innerHTML);
            var end = account_client + counten;
            document.getElementById('emprunt2').innerHTML = end.toLocaleString();
        }
    </script>
    <div class="container-fluid" onmouseover="count()">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">
                        <div class="none-plans" id="pricing-plans2" onmouseover="count()">
                            <div class="pricing-item">
                                <div class="pricing-header">
                                    <h3 class="pricing-title" style="width: auto;">AJOUTER UNE SOMME</h3>
                                </div>
                                <div class="pricing-body">
                                    <div class="price-wrapper" style="background: #10ded !important;">
                                        <span class="price" id="result_credit2"></span>
                                        <form action="/account_commande/{{$account->id_client}}" method="get">
                                            <label for="account" style="color:white;">LA SOMME AJOUTEE DU COMPTE</label>
                                            <div class="form-group">
                                                <input type="text" name="account_client" id="account_client" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                <span class="small btn btn-white btn-sm waves-effect">XAF</span>
                                            </div>
                                        <span class="period"></span>
                                    </div>
                                    <ul class="list" style="margin-left: 10%;">
                                        <li class="active textU ">LA  SOMME DEJA DANS LE COMPTE</li>
                                        <button disabled style="width:90%;" class="btn btn-primary" id="counte">{{$account->account_client}}</button>
                                        <li class="active textU">LA NOUVELLE SOMME DU COMPTE</li>
                                        <button type="reset" style="width:90%;" class="btn btn-primary" id="emprunt2">{{$account->account_client}}</button>
                                    </ul>
                                        <button type="submit" class="btn-hover btn-success button-dashboard">FAIRE LA COMMANDE</button>
                                    </form>
                                    <a href="/add_client">
                                        <button class="btn-hover btn-danger button-dashboard">Annuler</button>
                                    </a>
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
