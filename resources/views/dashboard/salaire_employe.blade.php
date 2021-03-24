@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Salaires des Emplo&eacute;s
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Salaires</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="body">
                    <div class="card-body card product_item_list responsive-mg-b-30">
                        <h6>Agence A</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="body">
                    <div class="row">
                        @php
                            $salarie = DB::select('select * from employe');
                            $count = count($salarie);
                        @endphp
                        @foreach ($salarie as $item)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="body">
                                    <div class="card-body card product_item_list responsive-mg-b-30 shadow">
                                        <div class="panel-body center">
                                            <img src="{{asset('uploads/employe/'.$item->image)}}" class="img-circle center m-b img-responsive shadow" width="140" height="140" alt="User" style="border-radius: 100%;margin-left:25%;"/>
                                            <h3 class="text-center center">{{ $item->nameEmp }},{{ $item->prenomEmp }}</h3>
                                            <p class="all-pro-ad text-center center">{{ $item->adresseEmp}},{{ $item->telEmp }}</p>
                                            <div class="list" style="margin-left: 1%;list-style:none;">
                                                @php
                                                    $prime = DB::select('select * from prime_agence_A where idEmp = '.$item->idEmp.'');
                                                @endphp
                                                <li class="active textU border-bottom">Montant total Du Salaire de base&eacute;</li>
                                                <h4 class="title titre text-center"> {{ number_format($item->salaireBaseEmp)}}</h4>
                                                <li class="active textU border-bottom">Montant Du Salaire Avec Prime</li>
                                                <h4 class="title titre text-center text-green col-green green"> {{ number_format(($item->salaireBaseEmp)*1.2)}}</h4>
                                                <li class="active textU border-bottom">Difference entre le salire et base / Primes</li>
                                                <h4 class="title titre text-center text-danger danger"> {{ number_format((($item->salaireBaseEmp)*1.2) - ($item->salaireBaseEmp))}}</h4>
                                                <div class="card-body">
                                                    @php
                                                        $name_user = DB::select('select idEmp from prime_agence_A where idEmp = '.$item->idEmp.'');
                                                    @endphp
                                                    @if (count($name_user) > 0)
                                                    <a href="edit_prime/{{$item->idEmp}}">
                                                        <button class="btn btn-default btn-block btn-waves"><i class="zmdi zmdi-edit"></i> <span>  Editer Les Primes</span> </button>
                                                    </a>
                                                    @else
                                                    <a href="add_prime/{{$item->idEmp}}">
                                                        <button class="btn btn-success btn-block btn-waves"><i class="zmdi zmdi-edit"></i> <span> Ajouter Les Primes</span> </button>
                                                    </a>
                                                    @endif
                                                    <a href="print_paye/{{$item->idEmp}}">
                                                        <button class="btn btn-primary btn-block btn-waves"><i class="zmdi zmdi-money"></i> <span> Imprimer la fiche de paye </span> </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
