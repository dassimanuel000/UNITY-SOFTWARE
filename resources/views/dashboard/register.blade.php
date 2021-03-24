@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Produits
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Produits</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body table-responsive">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover m-b-0">
                            <thead>
                            <tr>
                                <th data-breakpoints="sm xs">ID</th>
                                <th>Image</th>
                                <th>Nom du responsable d'agence</th>
                                <th data-breakpoints="sm xs">Phone</th>
                                <th data-breakpoints="xs">email</th>
                                <th data-breakpoints="sm xs">Role</th>
                                <th data-breakpoints="sm xs md">Edit</th>
                                <th data-breakpoints="sm xs md">Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $row)

                            <tr>
                                <td><span class="col-green">{{ $row->id }}</span></td>
                                <td><img src="{{asset('images/ecommerce/1.png')}}" width="48" alt="User"></td>
                                <td><h5>{{ $row->name }}</h5></td>
                                <td><span class="text-muted">{{ $row->phone }}</span></td>
                                <td>{{ $row->email }}</td>
                                <td><span class="col-green">{{ $row->usertype }}</span></td>
                                <td>
                                <a href="/role-edit/{{ $row->id }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit"></i></a>
                                </td>
                                <td>
                                <form action="/role-delete/{{ $row->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger waves-effect waves-float waves-red">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
                                </td>
                            </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
