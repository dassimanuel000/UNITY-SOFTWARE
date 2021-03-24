@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Evaluations
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Evaluations</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card product_item_list">
                <div class="body table-responsive">
                    <h2>Ajouter Une Evaluation</h2>
                    <br>
                        <h6>Ajouter les identifiants d'une Evaluation</h6>
                        <div class="card-body">
                            <form action="{{ route('form_add_upgrade') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nom de l'Evaluation</label>
                                    <div class="col-md-6">
                                        <input id="matricule_upgrade" type="text" class="form-control" name="matricule_upgrade" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Objectif de l'Evaluation</label>
                                    <div class="col-md-6">
                                        <input id="objectif" type="text" class="form-control" name="objectif" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Importance de l'Evaluation</label>
                                    <div class="col-md-6">
                                        <select name="importance" class="form-control select2-choice" required>
                                            <option value="Normal">Normal</option>
                                            <option value="Quotidienne">Quotidienne</option>
                                            <option value="Majeur">Majeur</option>
                                            <option value="Incontournable">Incontournable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Proposee par de l'Evaluation</label>
                                    <div class="col-md-6">
                                        <input id="examinateur" type="text" class="form-control" name="examinateur" placeholder="Mr / Mme ..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Les questions</label>
                                        @php
                                            for ($i=0; $i < 10; $i++) {
                                                echo '<div class="col-md-6">'.'<input type="text" class="form-control" name="question_'.$i.'" id="question_'.$i.'" placeholder="Question N# '.$i.'" required>'.'</div>'.'<br>';
                                            }
                                        @endphp
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
