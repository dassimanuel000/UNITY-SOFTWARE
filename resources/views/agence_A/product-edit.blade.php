@extends('agence_A.agence_A')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Editer Un Produit
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Editer</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body table-responsive">
                        <h3>Modifier les Caracteristiques du Produit</h3>
                        <div class="card-body">
                        <form action="/product-update/{{ $add_product->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form" >
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                    <label class="col-md-4 control-label">Referent du Produit</label>
                                    <div class="col-md-6">
                                        <input id="referent" type="text" class="form-control" name="referent" value="{{ $add_product->referent }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nom du Produit</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="{{ $add_product->title }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Description du Produit</label>
                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control" name="description" value="{{ $add_product->description }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Categorie du Produit</label>
                                    <div class="col-md-6">
                                        <select name="category" class="form-control select2-choice" required>
                                            <option value="{{ $add_product->category }}"> {{ $add_product->category }}</option>
                                            <option value="Accesoires">Accesoires</option>
                                            <option value="Carreaux">Carreaux</option>
                                            <option value="Plomberies">Plomberie</option>
                                            <option value="Ciments">Ciments</option>
                                            <option value="Fers">Fers</option>
                                            <option value="Tuyaux">Tuyaux</option>
                                            <option value="Outis">Outis( Marteaux, Tourne-vice)</option>
                                            <option value="Electriques">Electriques</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Quantit&eacute; du Produit</label>
                                    <div class="col-md-6">
                                        <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $add_product->quantity }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Prix Minimun du Produit</label>
                                    <div class="col-md-6">
                                        <input id="price_min" type="number" class="form-control" name="price_min" value="{{ $add_product->price_min }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Prix Maximun du Produit</label>
                                    <div class="col-md-6">
                                        <input id="price_max" type="number" class="form-control" name="price_max" value="{{ $add_product->price_max }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Quantit&eacute; du Stock D'alarme du Produit</label>
                                    <div class="col-md-6">
                                        <input id="alarm_stock" type="number" class="form-control" name="alarm_stock" value="{{ $add_product->alarm_stock }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Prix d'achat du Produit</label>
                                    <div class="col-md-6">
                                        <input id="price_achat" type="number" class="form-control" value="{{ $add_product->price_achat }}" name="price_achat" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-md-4 control-label">Ajouter Une Image</label>
                                        <input id="image" type="file" class="form-control" name="image" value="{{ $add_product->image }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Type / Famille du Produit</label>
                                    <div class="col-md-6">
                                        <input id="product_type" type="text" class="form-control" name="product_type" value="{{ $add_product->product_type }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fournisseur du Produit</label>
                                    <div class="col-md-6">
                                        <input id="provider" type="text" class="form-control" name="provider" value="{{ $add_product->provider }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Taxe du Produit</label>
                                    <div class="col-md-6">
                                        <input id="tax" type="number" class="form-control" name="tax" value="{{ $add_product->tax }}" required>
                                    </div>
                                </div>
                                <div class="nonen none" style="display: none;">
                                    <input type="hidden" name="id_emp" value="{{ Auth::user()->id }}" required readonly>
                                    <input type="hidden" name="name_emp" value="{{ Auth::user()->name }}" required readonly>
                                    <input type="hidden" name="update" value="{{ $add_product->update }}" readonly>
                                    <input type="hidden" name="prix_min_last" value="{{ $add_product->price_min }}" readonly>
                                    <input type="hidden" name="prix_max_last" value="{{ $add_product->price_max }}" readonly>
                                    <input type="hidden" name="prix_achat_last" value="{{ $add_product->price_achat }}" readonly>
                                    <input type="hidden" name="quantity_before" value="{{ $add_product->quantity }}" readonly>
                                    <input type="hidden" name="last_update" value="{{ $add_product->updated_at }}" readonly>
                                    <input type="hidden" name="quantity_last" value="{{ $add_product->quantity }}" readonly>
                                </div>
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-sign-in"></i>Modifier
                                    </button>

                                </div>
                            </form>
                            <a href="{{route('agence_A.list_product.index')}}">
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

@section('scripts')

@endsection
