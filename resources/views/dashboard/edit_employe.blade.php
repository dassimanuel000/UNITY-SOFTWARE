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
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">
                    <h2>Ajouter Un Salari&eacute;</h2>
                    <br>
                        <h6>Ajouter les identifiants d'un Salari&eacute;</h6>
                        <div class="card-body">
                            <form action="/form_update_employe/{{$edit_employe->idEmp}}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                {{ csrf_field() }}
                            {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nom du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="nameEmp" type="text" value="{{ $edit_employe->nameEmp}}" class="form-control" name="nameEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Pr&eacute;nom du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="prenomEmp" type="text" value="{{ $edit_employe->prenomEmp}}" class="form-control" name="prenomEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Tele&eacute;phone du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        + 237 : <input id="telEmp" type="tel" class="form-control" name="telEmp" value="{{ $edit_employe->telEmp}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Adresse Email du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="emailEmp" type="email" class="form-control" name="emailEmp" value="{{ $edit_employe->emailEmp}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Adresse du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="adresseEmp" type="tel" value="{{ $edit_employe->adresseEmp}}" class="form-control" name="adresseEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Agence du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <select id="agenceEmp" type="text" class="form-control" name="agenceEmp" required>
                                            <option value="{{ $edit_employe->agenceEmp }}">{{ $edit_employe->agenceEmp }}</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Age du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <input id="ageEmp" type="date" value="{{ $edit_employe->ageEmp}}" class="form-control" name="ageEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Statut du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <select name="statutEmp" class="form-control select2-choice" required>
                                            <option value="{{ $edit_employe->statutEmp}}">{{ $edit_employe->statutEmp}}</option>
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
                                            <option value="{{ $edit_employe->posteEmp}}">{{ $edit_employe->posteEmp}}</option>
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
                                        <input id="salaireBaseEmp" value="{{ $edit_employe->salaireBaseEmp}}" type="number" class="form-control" name="salaireBaseEmp" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Type D'emploi Du Salari&eacute;</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="typeEmp" required id="typeEmp">
                                            <option value="{{ $edit_employe->typeEmp}}">{{ $edit_employe->typeEmp}}</option>
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
                                        <select name="sexeEmp" id="sexeEmp" required>
                                            <option value="{{ $edit_employe->sexeEmp}}">{{ $edit_employe->sexeEmp}}</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">PHOTO du Salari&eacute;</label>
                                    <div class="col-md 6">
                                        <input type="file" required class="form-control" name="image" id="image" value="{{ $edit_employe->image}}"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-sign-in"></i>Modifier
                                    </button>
                                </div>
                            </form>
                            <a href="/list_employe">
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
