@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Parametres
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Parametres</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">

            @if (session('parametre_agence'))
            <div class="col-lg-12 col-md-12">
                <div class="card product_item_list">
                    <div class="body table-responsive shadow">
                        <div class="alert alert-success" role="alert">
                            {{ session('parametre_agence') }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-6">
                <div class="card product_item_list">
                    <div class="body shadow">
                        <h6>LES INITIAUX DES AGENCES</h6>
                        <br>
                        <table id="DataTable" class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th data-breakpoints="sm xs">Agences</th>
                                    <th data-breakpoints="sm xs">Initial</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Agence A</td>
                                    <td>
                                        @php
                                           $init_a = DB::select('select initial_agence from users where usertype = "Chef_agence_A"');
                                        @endphp
                                        @foreach ($init_a as $item)
                                            <div class="col-md-3 border-bottom">
                                                <a  class="btn btn-primary" style="color: #fff">
                                                    <i class="fa fa-btn fa-sign-in"></i>{{ $item->initial_agence }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Agence B</td>
                                    <td>
                                        @php
                                           $init_a_2 = DB::select('select initial_agence from users where usertype = "Chef_agence_B"');
                                        @endphp
                                        @foreach ($init_a_2 as $item)
                                            <div class="col-md-3 border-bottom">
                                                <a  class="btn btn-primary" style="color: #fff">
                                                    <i class="fa fa-btn fa-sign-in"></i>{{ $item->initial_agence }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Agence C</td>
                                    <td>
                                        @php
                                           $init_a_3 = DB::select('select initial_agence from users where usertype = "Chef_agence_C"');
                                        @endphp
                                        @foreach ($init_a_3 as $item)
                                            <div class="col-md-3 border-bottom">
                                                <a  class="btn btn-primary" style="color: #fff">
                                                    <i class="fa fa-btn fa-sign-in"></i>{{ $item->initial_agence }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Agence D</td>
                                    <td>
                                        @php
                                           $init_a_4 = DB::select('select initial_agence from users where usertype = "Chef_agence_D"');
                                        @endphp
                                        @foreach ($init_a_4 as $item)
                                            <div class="col-md-3 border-bottom">
                                                <a  class="btn btn-primary" style="color: #fff">
                                                    <i class="fa fa-btn fa-sign-in"></i>{{ $item->initial_agence }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card product_item_list">
                    <div class="body shadow">
                        <h6>MODIFIER LES INITIAUX DES AGENCES</h6>
                        <br>
                        <form action="{{ route('form_update_initial') }}" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" id="form_update_initial">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <select name="agence" class="form-input input form-control select" id="id_agence">
                                        <option value="Chef_agence_A">Agence A</option>
                                        <option value="Chef_agence_B">Agence B</option>
                                        <option value="Chef_agence_C">Agence C</option>
                                        <option value="Chef_agence_D">Agence D</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-input input form-control" name="new_initial" id="new_initial" placeholder="entrez le nouvel initial"/>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-sign-in"></i>MODIFIER
                                    </button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
