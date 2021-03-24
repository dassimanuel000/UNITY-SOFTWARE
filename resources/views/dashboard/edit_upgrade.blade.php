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
                    <h2>Editer Une Evaluation</h2>
                    <br>
                        <h6>Editer les identifiants d'une Evaluation</h6>
                        <div class="card-body">
                            <form action="/form_edit_upgrade/{{$edit_upgrade->idupgrade }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nom de l'Evaluation</label>
                                    <div class="col-md-6">
                                        <input id="matricule_upgrade" type="text" class="form-control" name="matricule_upgrade" value="{{ $edit_upgrade->matricule_upgrade }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Objectif de l'Evaluation</label>
                                    <div class="col-md-6">
                                        <input id="objectif" type="text" class="form-control" name="objectif" value="{{ $edit_upgrade->objectif }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Importance de l'Evaluation</label>
                                    <div class="col-md-6">
                                        <select name="importance" class="form-control select2-choice" required>
                                            <option value="{{ $edit_upgrade->importance }}">{{ $edit_upgrade->importance }}</option>
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
                                        <input id="examinateur" type="text" class="form-control" name="examinateur" value="{{ $edit_upgrade->examinateur }}" placeholder="Mr / Mme ..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Les questions</label>
                                    @php
                                        $question = json_decode(($edit_upgrade->question), true);
                                        $c = 1;
                                    @endphp
                                    @for ($i = 0; $i < 10; $i++)
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="question_{{$i}}" id="question_{{$i}}'" value="{{ $question[$i]}}" placeholder="Question N# {{$i}}" required>
                                                <br>
                                            </div>
                                            @php
                                                $c++;
                                            @endphp
                                    @endfor
                                </div>
                                <div class="row">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-success btn-block btn-top btn-waves">
                                                <i class="fa fa-btn fa-sign-in"></i>Modifier
                                            </button>
                                        </div>
                                    <div class="col-md-6 col-md-offset-4">
                                        <a href="/upgrade">
                                            <abbr class="btn btn-danger btn-block btn-top btn-waves">
                                                <i class="fa fa-btn fa-sign-in"></i>Cancel
                                            </abbr>
                                        </a>
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
