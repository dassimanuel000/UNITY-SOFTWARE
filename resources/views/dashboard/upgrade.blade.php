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
                    <li class="breadcrumb-item active">Evaluations</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                @if (session('upgrade'))
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="card product_list product_item">
                                <div class="col-lg-12">
                                    <br>
                                    <div class="alert alert-success" role="alert">
                                        {{ session('upgrade') }}
                                        Merci
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="body">
                    <div class="row">
                        @php
                            $eval = DB::select('select * from upgrade');
                            $count = count($eval);
                        @endphp
                        @foreach ($eval as $item)
                            <div class="col-lg-6">
                                <div class="card product_item_list">
                                    <div class="body">
                                        <div class="m-b-0 text-left border-bottom">
                                            <h2 class="text-justify">
                                                {{ $item->matricule_upgrade}}
                                            </h2>
                                        </div>
                                        <br>
                                        <div class="m-b-0 text-left">
                                            <h5 class="text-justify">
                                               Objectif :  {{ $item->objectif}}
                                            </h5>
                                        </div>
                                        <div class="m-b-0 text-left">
                                            <h5 class="text-justify">
                                                Importance :
                                                    <span class="text-title title text-justify">{{ $item->importance }}</span>
                                                    @if ( ($item->importance) != 'Majeur' )
                                                        <i class="zmdi zmdi-check-circle" style="color: lime"></i>
                                                    @else
                                                        <i class="zmdi zmdi-alert-circle" style="color: red"></i>
                                                    @endif

                                            </h5>
                                        </div>
                                        <div class="m-b-0 text-left">
                                            <h5 class="text-justify">
                                               Proposee par :  {{ $item->examinateur}}
                                            </h5>
                                        </div>
                                        <div class="m-b-0 text-left">
                                            <h5 class="text-justify font-15">
                                                <ul type=".">
                                                    @php
                                                        $question = json_decode(($item->question), true);
                                                    @endphp
                                                    @for ($i = 0; $i < 10; $i++)
                                                            <li class="color-grey review-text font-italic m-0">{{ $question[$i]}}</li>
                                                    @endfor
                                                </ul>
                                            </h5>
                                        </div>
                                        <div class="m-b-0 text-center center">
                                            <h5 class="center">
                                                <a href="/edit_upgrade/{{ $item->idupgrade }}">
                                                    <button class="btn btn-success waves-effect waves-float waves-green"><i class="zmdi zmdi-edit"></i><span> Editer</span></button>
                                                </a>
                                                <a href="/print_upgrade/{{ $item->idupgrade }}">
                                                    <button class="btn btn-primary waves-effect waves-float waves-green"><i class="zmdi zmdi-print"></i><span> Imprimer</span></button>
                                                </a>
                                                <a href="/delete_upgrade/{{ $item->idupgrade }}">
                                                    <button class="btn btn-danger waves-effect waves-float waves-green"><i class="zmdi zmdi-delete"></i><span> Supprimer</span></button>
                                                </a>
                                            </h5>
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
