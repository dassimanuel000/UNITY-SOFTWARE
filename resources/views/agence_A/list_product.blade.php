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
                    <div class="body">
                        <h2>Listes des Produits</h2>
                        <!--------------------------------->

                        <!---->
                        <h3>Trier par Categorie Produit</h3>
                        <div class="body table-responsive">
                        @if (session('add_product'))
                            <div class="alert alert-success" role="alert">
                                {{ session('add_product') }}
                            </div>
                        @endif
                            <table id="DataTable" class="table table-hover m-b-0">
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
                                    <td>{{ $row->description }}</td>
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
                            {{ $add_product->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
        $('#DataTable').DataTable();
        } );
    </script>
</section>

@endsection
