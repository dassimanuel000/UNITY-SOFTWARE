@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Salari&eacute;s
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Salari&eacute;s</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card product_item_list">
                <div class="body table-responsive">
                    <h2>Ajouter Un Salari&eacute;</h2>
                    <br>
                        <h6>Ajouter les identifiants d'un Salari&eacute;</h6>
                        <div class="card-body">
                            <form action="{{ route('form_add_employe') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nom du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="nameEmp" type="text" class="form-control" name="nameEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Pr&eacute;nom du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="prenomEmp" type="text" class="form-control" name="prenomEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Tele&eacute;phone du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="telEmp" type="tel" class="form-control" name="telEmp" required placeholder="+ 237 : ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Adresse Email du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="emailEmp" type="email" class="form-control" name="emailEmp" required placeholder="email@email.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Adresse du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="adresseEmp" type="tel" class="form-control" name="adresseEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Agence du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <label for="" class="label">Agence de : </label>
                                        <select id="agenceEmp" type="text" class="form-control" name="agenceEmp" required>
                                            <option value="SA A">SA A</option>
                                            <option value="OBALA 1">OBALA 1</option>
                                            <option value="OBALA 2">OBALA 2</option>
                                            <option value="OBOLO">OBOLO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Age du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="ageEmp" type="date" class="form-control" name="ageEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Statut du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <select name="statutEmp" class="form-control select2-choice" required>
                                            <option value="Celibataire">Celibataire</option>
                                            <option value="Marie sans enfant">Mari&eacute; sans enfant</option>
                                            <option value="Marie avec enfants">Marie avec enfants</option>
                                            <option value="Divorce">Divorce</option>
                                            <option value="En couple avec un enfant">En couple avec un enfant</option>
                                            <option value="Ambigue">Ambigue</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Poste du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <select name="posteEmp" class="form-control select2-choice" required>
                                            <option value="salarie">none</option>
                                            <option value="Technicien">Technicien</option>
                                            <option value="Chef d'Agence">Chef d'Agence</option>
                                            <option value="Magasinier">Magasinier</option>
                                            <option value="Assistant Magasinier">Assistant Magasinier</option>
                                            <option value="Cadre">Cadre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Salaire de Base du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="salaireBaseEmp" type="number" class="form-control" name="salaireBaseEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Type D'emploi Du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="typeEmp" required id="typeEmp">
                                            <option value="CDI">CDI</option>
                                            <option value="CDD">CDD</option>
                                            <option value="Stage">Stage</option>
                                            <option value="Alternance">Alternance</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md 6">
                                        <label class="col-md-4 control-label">PHOTO du Salari&eacute;</label>
                                        <div class="col-md 6">
                                            <input type="file" required name="image" id="image" value="" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="radio" id="Homme" name="sexeEmp" value="Homme" required>
                                    <label for="Homme">Homme</label><br>
                                    <input type="radio" id="Femme" name="sexeEmp" value="Femme" required>
                                    <label for="Femme">Femme</label><br>
                                </div>
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-sign-in"></i>Ajouter
                                    </button>
                                </div>
                            </form>
                            <a href="/dashboard">
                                <button class="btn btn-danger">
                                    <i class="fa fa-btn fa-sign-in"></i>Cancel
                                </button>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
