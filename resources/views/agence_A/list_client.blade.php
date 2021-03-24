@extends('agence_A.agence_A')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Clients
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Clients</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">
                        <h2>Liste des Clients</h2>
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
                                    <th data-breakpoints="sm xs">Name</th>
                                    <th class="compte" data-breakpoints="sm xs">Compte</th>
                                    <th data-breakpoints="sm xs">adresse</th>
                                    <th data-breakpoints="sm xs">Entreprise</th>
                                    <th data-breakpoints="sm xs">Telephone</th>
                                    <th data-breakpoints="sm xs">Sexe</th>
                                    <th data-breakpoints="sm xs md">Editer</th>
                                    <th data-breakpoints="sm xs md">Modifier</th>
                                </tr>
                                </thead>
                                <tbody>
                                        @foreach ($client_agence_A as $row)

                                <tr>
                                    <td><span class="col-green">{{ $row->id_client }}</span></td>
                                    <td><h5>{{ $row->name_client }}</h5></td>
                                    <td><span class="col-green">{{ $row->account_client }}</span></td>
                                    <td>{{ $row->adress_client }}</td>
                                    <td><span class="text-muted">{{ $row->entreprise_client }}</span></td>
                                    <td><span class="text-muted">{{ $row->telephone_client }}</span></td>
                                    <td class="price_min"><span class="col-green">{{ $row->sexe_client }}</span></td>
                                    <td>
                                    <a href="/client-edit/{{ $row->id_client }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit"></i></a>
                                    </td>
                                    <td>
                                    <form action="/client-delete/{{ $row->id_client }}" method="POST">
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
                            {{ $client_agence_A->render() }}
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
