@extends('agence_A.agence_A')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Commandes passees
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Commandes passees</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            @if (session('facture_emis'))
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="alert alert-success" role="alert">
                    {{ session('facture_emis') }}
                    <template>wewe</template>
                </div>
            </div>
            @endif
            @foreach ($facture_emis as $item)
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="card product_item">
                    <div class="body">
                        <div class="text m-b-0">
                            <p class="title p border-bottom">
                                <b class="title " style="text-transform: uppercase;">
                                    @php
                                        $nameClient = json_decode(($item->nameClient), true);
                                        $nameClient = $nameClient[0];
                                    @endphp
                                    Nom du client: <br><b>{{ $nameClient}}</b>
                                </b>
                            </p>
                            <small class="font12">
                                identifiant: <b>{{ $item->identifiantFacture}}</b>
                            </small>
                            <br>
                            <small class="font12">
                                @php
                                    $allQuantityCommande = json_decode(($item->allQuantityCommande), true);
                                    $allQuantityCommande = $allQuantityCommande[0];
                                @endphp
                                Quantite Commande:<b> {{ $allQuantityCommande}}</b>
                            </small>
                            <br>
                            <small class="font12">
                                Montant total: <b>{{ $item->totalFacture}}</b>
                            </small>
                            <br>
                            <small class="font12">
                                Fait le: <b>{{ $item->created_at}}</b>
                            </small>
                        </div>
                        <div class="m-b-0">
                            <a href="facture_emis_commande/{{$item->idfacture_emis}}" class="btn btn-success btn-lg btn-block waves-effect"><i class="zmdi zmdi-print"></i> <i></i> IMPRIMER</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
