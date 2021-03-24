@extends('agence_A.agence_A')
@section('content')
@php
    $moisv = DATE('M');
    $annev = DATE('Y');
    $jourv = date('Y-m-d');
@endphp
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Horaires
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Horaires</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4" style="float: left;">
                        <div class="card product_item_list">
                            <div class="body">
                                <div class="row">
                                    <div class="card-body">
                                        <div class="user-avatar text-center d-block">
                                            <img src="{{asset('uploads/employe/'. $add_horaire->image) }}" alt="voir_employe" class="img-fluid img-responsive img-fluid2 img-fluid" />
                                        </div>
                                        <div class="text-center">
                                            <h2 class="font-24 mb-0">{{ $add_horaire->nameEmp}} , {{ $add_horaire->prenomEmp}}</h2>
                                            <p>{{ $add_horaire->posteEmp}}, @ {{ $add_horaire->typeEmp}}</p>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <h2 class="font-18">Contact Information</h2>
                                        <br/>
                                        <div class="border-right">
                                            <ul class="list-unstyled mb-2">
                                            <li class="mb-2"><i class="zmdi zmdi-email"></i><i class="fas fa-fw fa-envelope mr-2"></i>{{ $add_horaire->emailEmp}}</li>
                                            <li class="mb-0"><i class="zmdi zmdi-phone"></i><i class="fas fa-fw fa-phone mr-2"></i>{{ $add_horaire->telEmp}}</li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card product_item_list">
                            <div class="body">
                                    <h3 class="product-title m-b-0">Respectez L'heure !</h3>
                                    <form action="{{ Route('form_add_horaire')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" name="matriculeEmp" value="{{ $add_horaire->matricule}}">
                                            <input type="hidden" name="nameEmp" value="{{ $add_horaire->nameEmp}}">
                                            <input type="hidden" name="idEmp" value="{{ $add_horaire->idEmp}} ">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Annee  Actuel</label>
                                            <div class="col-md-6">
                                                <select id="year" type="text" class="form-control" name="year" required>
                                                    <option value="{{ $annev }}">{{ $annev }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Mois  Actuel</label>
                                            <div class="col-md-6">
                                                <select id="month" type="text" class="form-control" name="month" required>
                                                    <option value="{{ $moisv }}">{{ $moisv }}</option>
                                                    <option value="janvier">janvier</option>
                                                    <option value="fevrier">fevrier</option>
                                                    <option value="mars">mars</option>
                                                    <option value="avril">avril</option>
                                                    <option value="Mai">Mai</option>
                                                    <option value="juin">juin</option>
                                                    <option value="juillet">juillet</option>
                                                    <option value="Aout">Aout</option>
                                                    <option value="septembre">septembre</option>
                                                    <option value="octobre">octobre</option>
                                                    <option value="Novembre">Novembre</option>
                                                    <option value="decembre">decembre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">La Journ&eacute;e du </label>
                                            <div class="col-md-6">
                                                <select id="date" type="text" class="form-control" name="date" required>
                                                    <option value="{{ $jourv }}">{{ $jourv }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h3>HEURE D'ARRIVE</h3>
                                        <div class="form-group">
                                            <div class="col-md-4" >
                                                <label class="">Heure D'arrive de MR / MME  : {{ $add_horaire->nameEmp}}</label>
                                                <select id="hourstart" type="text" class="form-control" name="hourstart" required>
                                                    @php
                                                        for ($i=6; $i < 16; $i++) {
                                                            echo '<option value="'.$i.'">'.$i.' H</option>';
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                            <div class="col-md-4" >
                                                <label class="control-label">Minute D'arrive de MR / MME  : {{ $add_horaire->nameEmp}}</label>
                                                <select id="minutestart" type="text" class="form-control" name="minutestart" required>
                                                    @php
                                                        for ($i=0; $i < 60; $i++) {
                                                            echo '<option value="'.$i.'">'.$i.' Min </option>';
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                        <h3>HEURE DE DEPART</h3>
                                        <div class="form-group">
                                            <div class="col-md-4" >
                                                <label class="">Heure De Depart de MR / MME  : {{ $add_horaire->nameEmp}}</label>
                                                <select id="hourstop" type="text" class="form-control" name="hourstop" required>
                                                    @php
                                                        for ($i=6; $i < 24; $i++) {
                                                            echo '<option value="'.$i.'">'.$i.' H</option>';
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Minute De Depart de MR / MME  : {{ $add_horaire->nameEmp}}</label>
                                                <select id="minutestop" type="text" class="form-control" name="minutestop" required>
                                                    @php
                                                        for ($i=0; $i < 60; $i++) {
                                                            echo '<option value="'.$i.'">'.$i.' Min </option>';
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                        <button class="btn-hover btn-success btn btn-round waves button-dashboard" type="submit">VALIDER</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr">
                <hr/>
            </div>
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">

                        <a href="{{route('agence_A.horaire.index')}}">
                            <button class="btn-hover btn waves color-9 button-dashboard">Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
