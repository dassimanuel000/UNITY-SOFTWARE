@extends('agence_A.agence_A')
@section('content')
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
                    <li class="breadcrumb-item active">Add Stocks</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item">
                    <div class="body">
                        <h2>Ajouter Un Client</h2>
                        <h5>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        </h5>
                        <h3>Ajouter les identifiants d'un Client</h3>
                        <div class="card-body">
                            <form action="{{ route('form_client_add') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nom du Client</label>
                                    <div class="col-md-6">
                                        <input id="name_client" type="text" class="form-control" name="name_client" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Adresse du Client</label>
                                    <div class="col-md-6">
                                        <input id="adress_client" type="text" class="form-control" name="adress_client" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">telephone du Client</label>
                                    <div class="col-md-6">
                                        <input id="telephone_client" type="tel" class="form-control" name="telephone_client" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">entreprise du Client</label>
                                    <div class="col-md-6">
                                        <input id="entreprise_client" type="text" class="form-control" name="entreprise_client" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Montant du Compte Client</label>
                                    <div class="col-md-6">
                                        <input id="account_client" type="number" class="form-control" name="account_client" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="radio" id="male" name="sexe_client" value="male" required>
                                    <label for="male">Male</label><br>
                                    <input type="radio" id="female" name="sexe_client" value="female" required>
                                    <label for="female">Female</label><br>
                                </div>
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-sign-in"></i>Ajouter
                                    </button>
                                </div>
                            </form>
                            <a href="/add_client">
                                <button class="btn btn-danger">
                                    <i class="fa fa-btn fa-sign-in"></i>Cancel
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
