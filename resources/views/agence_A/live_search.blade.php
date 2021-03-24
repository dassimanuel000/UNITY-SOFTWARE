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
                    <li class="breadcrumb-item active">Les Stocks</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body" id="results">
                        <h2>Recherche des Produits</h2>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
                        <script type="text/javascript">
                            var path="{{ route('agence_A.live_search.autocomplete') }}";
                            $('input.typeahead').typeahead({
                                source:function (query,process){
                                    return $.get(path, {query:title} function (data) {
                                        return process(data);
                                    });
                                }
                            });
                        </script>
                        <form method="get" action="{{ route('agence_A.live_search.search') }}"  id="searchForm">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Rechercher du Produit</label>
                                <input type="text" name="live_search" id="live_search" class="form-control typeahead" required placeholder="Rechercher un produit"/>
                                <button type="submit" class="btn btn-primary" value="Rechercher" id="input_search">
                                    Rechercher
                                </button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <h6>Nombre de resultats<span id="total_records"></span></h6>
                        </div>
                        <h3>Trier par Categorie Produit</h3>
                        <div class="body table-responsive">
                            <table id="DataTable" class="table table-hover m-b-0 table-bordered">
                                <thead>
                                <tr>
                                    <th data-breakpoints="sm xs">ID</th>
                                    <th>Image</th>
                                    <th>Referent</th>
                                    <th data-breakpoints="sm xs">Titre</th>
                                    <th data-breakpoints="xs">Description</th>
                                    <th data-breakpoints="sm xs">Categories</th>
                                    <th data-breakpoints="sm xs md">Quantit&eacute;s</th>
                                    <th data-breakpoints="sm xs md">Prix Min</th>
                                    <th data-breakpoints="sm xs md">Prix Max</th>
                                    <th data-breakpoints="sm xs md">Stock D'alarme</th>
                                    <th data-breakpoints="sm xs md">Type du Produit</th>
                                    <th data-breakpoints="sm xs md">Fournisseurs</th>
                                    <th data-breakpoints="sm xs md">Taxes</th>
                                    <th data-breakpoints="sm xs md">Editer</th>
                                    <th data-breakpoints="sm xs md">Modifier</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($add_product as $row)

                                <tr>
                                    <td><span class="col-green">{{ $row->id }}</span></td>
                                    <td>
                                        <a href="/show_product/{{ $row->id }}">
                                            <img src="{{asset('uploads/stock_agence_A/'. $row->image) }}" width="48" alt="Produit">
                                        </a>
                                    </td>
                                    <td><h5>{{ $row->referent }}</h5></td>
                                    <td><span class="text-muted">{{ $row->title }}</span></td>
                                    <td>{{ $row->description }} <h5>{{ Carbon\Carbon::parse($row->created_at)->diffforHumans() }}</h5></td>
                                    <td><span class="text-muted">{{ $row->category }}</span></td>
                                    <td><span class="text-muted">{{ $row->quantity }}</span></td>
                                    <td class="price_min"><span class="col-green">{{ $row->price_min }}</span></td>
                                    <td class="price_max"><span class="col-red">{{ $row->price_max }}</span></td>
                                    <td><span class="text-muted">{{ $row->alarm_stock }}</span></td>
                                    <td><span class="text-muted">{{ $row->product_type }}</span></td>
                                    <td><span class="text-muted">{{ $row->provider }}</span></td>
                                    <td><span class="text-muted">{{ $row->tax }}</span></td>
                                    <td>
                                    <a href="/product-edit/{{ $row->id }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit"></i></a>
                                    </td>
                                    <td>
                                    <form action="/product-delete/{{ $row->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger waves-effect waves-float waves-red">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $add_product->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('extra-js')
    <script src="js/pages/axios.min.js"></script>

@endsection
