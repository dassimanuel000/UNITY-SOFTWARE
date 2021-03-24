@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Editer Utilisateur
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
                        <h3>Modifier les identifiants d'un employe</h3>
                        <div class="card-body">
                        <form action="/role-register-update/{{ $users->id }}" method="POST" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}" required>
                                        <span class="error_form" id="email_error_message"></span>
                                        <span class="error_form" id="email_invalide_error_message"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="name" class="form-control" name="name" value="{{ $users->name }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">phone</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="phone" class="form-control" name="phone" value="{{ $users->phone }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Agences</label>
                                    <div class="col-md-6">
                                        <select name="usertype" class="form-control select2-choice" required>
                                            <option value="">none</option>
                                            <option value="Chef_agence_A">Chef_agence_A</option>
                                            <option value="Magasin_agence_A">Magasinier_agence_A</option>
                                            <option value="Chef_agence_B">Chef_agence_B</option>
                                            <option value="Magasinier_agence_B">Magasinier_agence_B</option>
                                            <option value="Chef_agence_C">Chef_agence_C</option>
                                            <option value="Magasinier_agence_C">Magasinier_agence_C</option>
                                            <option value="Chef_agence_D">Chef_agence_D</option>
                                            <option value="Magasinier_agence_D">Magasinier_agence_D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-sign-in"></i>Modifier
                                    </button>

                                </div>
                            </form>
                            <a href="/role-register">
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
