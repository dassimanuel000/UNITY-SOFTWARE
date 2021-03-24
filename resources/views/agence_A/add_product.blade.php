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
            @if (session('status'))
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card product_item">
                    <div class="body">
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                                PRODUIT BIEN AJOUTEE
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-12">
                <div class="card product_item">
                    <div class="body">
                        <h2>Ajouter Un Produit</h2>
                        <h3>Ajouter les identifiants d'un Produit</h3>
                        <div class="card-body">
                            <form action="{{ route('form_add_product') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Referent du Produit</label>
                                    <div class="col-md-6">
                                        <input id="referent" type="text" class="form-control" name="referent" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nom du Produit</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Description du Produit</label>
                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control" name="description" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Famille du Produit</label>
                                    <div class="col-md-6">
                                        <select name="product_family" required class="form-control select2-choice" required>
                                            @php
                                                $famille = DB::select('select all_familly from list_product ');
                                                $famille_2 = DB::select('select all_familly from list_product2 ');
                                            @endphp
                                            @foreach ($famille as $item)
                                                @php
                                                    $question = json_decode(($item->all_familly), true);
                                                    $count = count($question);
                                                @endphp
                                                @for ($i = 0; $i < $count; $i++)
                                                    <option value="{{ $question[$i]}}">{{ $question[$i]}}</option>
                                                @endfor
                                            @endforeach
                                            @foreach ($famille_2 as $item_2)
                                                @php
                                                    $question_2 = json_decode(($item_2->all_familly), true);
                                                    $count_2 = count($question_2);
                                                @endphp
                                                @for ($i_2 = 0; $i_2 < $count_2; $i_2++)
                                                    <option value="{{ $question_2[$i_2]}}">{{ $question_2[$i_2]}}</option>
                                                @endfor
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Type  du Produit</label>
                                    <div class="col-md-6">
                                        <select name="product_type" required class="form-control select2-choice" required>
                                            @php
                                                $all_type = DB::select('select all_type from list_product ');
                                                $all_type_2 = DB::select('select all_type from list_product2 ');
                                            @endphp
                                            @foreach ($all_type as $item)
                                                @php
                                                    $_all_type = json_decode(($item->all_type), true);
                                                    $_count = count($_all_type);
                                                @endphp
                                                @for ($i = 0; $i < $_count; $i++)
                                                    <option value="{{ $_all_type[$i]}}">{{ $_all_type[$i]}}</option>
                                                @endfor
                                            @endforeach

                                            @foreach ($all_type_2 as $item_2)
                                                @php
                                                    $_all_type_2 = json_decode(($item_2->all_type), true);
                                                    $_count_2 = count($_all_type_2);
                                                @endphp
                                                @for ($i_2 = 0; $i_2 < $_count_2; $i_2++)
                                                    <option value="{{ $_all_type_2[$i_2]}}">{{ $_all_type_2[$i_2]}}</option>
                                                @endfor
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Categorie du Produit</label>
                                    <div class="col-md-6">
                                        <select name="category" class="form-control select2-choice" required>
                                            @php
                                                $all_categorie = DB::select('select all_categorie from list_product ');
                                                $all_categorie_2 = DB::select('select all_categorie from list_product2 ');
                                            @endphp
                                            @foreach ($all_categorie as $item)
                                                @php
                                                    $_all_categorie = json_decode(($item->all_categorie), true);
                                                    $__count = count($_all_categorie);
                                                @endphp
                                                @for ($i = 0; $i < $__count; $i++)
                                                    <option value="{{ $_all_categorie[$i]}}">{{ $_all_categorie[$i]}}</option>
                                                @endfor
                                            @endforeach

                                            @foreach ($all_categorie_2 as $item_2)
                                                @php
                                                    $_all_categorie_2 = json_decode(($item_2->all_categorie), true);
                                                    $__count_2 = count($_all_categorie_2);
                                                @endphp
                                                @for ($i_2 = 0; $i_2 < $__count_2; $i_2++)
                                                    <option value="{{ $_all_categorie_2[$i_2]}}">{{ $_all_categorie_2[$i_2]}}</option>
                                                @endfor
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Quantit&eacute; du Produit</label>
                                    <div class="col-md-6">
                                        <input id="quantity" type="number" class="form-control" name="quantity" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Prix Minimun du Produit</label>
                                    <div class="col-md-6">
                                        <input id="price_min" type="number" class="form-control" name="price_min" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Prix Maximun du Produit</label>
                                    <div class="col-md-6">
                                        <input id="price_max" type="number" class="form-control" name="price_max" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Quantit&eacute; du Stock D'alarme du Produit</label>
                                    <div class="col-md-6">
                                        <input id="alarm_stock" type="number" class="form-control" name="alarm_stock" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Prix d'achat du Produit</label>
                                    <div class="col-md-6">
                                        <input id="price_achat" type="number" class="form-control" name="price_achat" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-md-4 control-label">Ajouter Une Image</label>
                                        <input id="image" type="file" class="form-control" name="image" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fournisseur du Produit</label>
                                    <div class="col-md-6">
                                        <input id="provider" type="text" class="form-control" name="provider" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Taxe du Produit</label>
                                    <div class="col-md-6">
                                        <input id="tax" type="number" class="form-control" name="tax" required>
                                    </div>
                                </div>
                                <div class="nonen none" style="display: none;">
                                    <input type="hidden" name="id_emp" value="{{ Auth::user()->id }}" required readonly>
                                    <input type="hidden" name="name_emp" value="{{ Auth::user()->name }}" required readonly>
                                </div>
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-sign-in"></i>Ajouter
                                    </button>
                                    <a href="/add_product">
                                        <button class="btn btn-danger">
                                            <i class="fa fa-btn fa-sign-in"></i>Cancel
                                        </button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
