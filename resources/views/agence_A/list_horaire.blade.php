@extends('agence_A.agence_A')
@section('content')
@php
    $moisv = DATE('M');
    $annev = DATE('Y');
    $jourv = date('Y-m-d');
    $i = 0;
@endphp
<style>
    .visible{
        background-color: rgb(12, 180, 12);
        color: #fff;
    }
    .none{
        background-color: rgb(255, 121, 121);
        color: #fff;
    }
    .orange{
        background-color: orange;
        color: #000;
    }
</style>
<section class="content ecommerce-page" onload="decor()">
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
    <div class="container-fluid" onmouseover="decor()">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4" >
                        <div class="card product_item_list">
                            <div class="body">
                                <div class="row">
                                    <div class="card-body">
                                        <div class="user-avatar text-center d-block">
                                            <img src="{{asset('uploads/employe/'. $list_horaire->image) }}" alt="voir_employe" class="img-fluid img-responsive img-fluid2 img-fluid" style="border-radius: 100%;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card product_item_list">
                            <div class="body">
                                <div class="text-center">
                                    <h2 class="font-24 mb-0">{{ $list_horaire->nameEmp}} , {{ $list_horaire->prenomEmp}}</h2>
                                    <p>{{ $list_horaire->posteEmp}}, @ {{ $list_horaire->typeEmp}}</p>
                                </div>
                                <div class="card-body border-top">
                                    <h2 class="font-18">Contact Information</h2>
                                    <div class="border-right">
                                        <ul class="list-unstyled mb-2">
                                        <li class="mb-2"><i class="zmdi zmdi-email"></i><i class="fas fa-fw fa-envelope mr-2"></i>{{ $list_horaire->emailEmp}}</li>
                                        <li class="mb-0"><i class="zmdi zmdi-phone"></i><i class="fas fa-fw fa-phone mr-2"></i>{{ $list_horaire->telEmp}}</li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr">
                <hr/>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card product_item_list">
                            <div class="body">
                                <div  style="color: #fff">
                                <table id="DataTable" class="table table-hover m-b-0">
                                    <thead>
                                    </div>
                                        <tr>
                                            <th data-breakpoints="sm xs">Ann&eacute;e</th>
                                            <th data-breakpoints="sm xs">Mois</th>
                                            <th data-breakpoints="sm xs">Jour</th>
                                            <th data-breakpoints="sm xs">Heure D'arriv&eacute;e</th>
                                            <th data-breakpoints="sm xs">Heure De D&eacute;part</th>
                                        </tr>
                                    </thead>
                                    <tbody id='tbody'>
                                        @php
                                            $recap_horaire = DB::select('select * from horaire where idEmp = '.$list_horaire->idEmp.'');
                                            $count = count($recap_horaire);
                                            //$recap_horaire = json_encode($recap_horaire);
                                        @endphp
                                        @foreach ($recap_horaire as $item)
                                            <tr>
                                                <th class="border-top">{{ $item->year}}</th>
                                                <th class="border-top">{{ $item->month}}</th>
                                                <th class="border-l">{{ $item->date}}</th>
                                                <th class="border-l" id="block_start{{ $i}}">
                                                    <input type="hidden" name="hourstart{{ $i }}" id="hourstart{{ $i }}" value="{{ $item->hourstart }}">
                                                    {{ $item->hourstart}}H : {{ $item->minutestart}} Min
                                                    @if ($item->hourstart > 7)
                                                        <button type="reset" class="btn btn-danger">En retard</button>
                                                    @else
                                                        <button type="reset" class="btn btn-success">A l'heure</button>
                                                    @endif
                                                </th>
                                                <th class="border-l" id="block_stop{{ $i}}">
                                                    <input type="hidden" name="hourstop{{ $i }}" id="hourstop{{ $i }}" value="{{ $item->hourstop }}">
                                                    {{ $item->hourstop}}H : {{ $item->minutestop}} Min
                                                    @if ($item->hourstop > 20)
                                                        <button type="reset" class="btn btn-success">Heure supplementaire effectue</button>
                                                    @endif
                                                    @if ($item->hourstop < 14)
                                                        <button type="reset" class="btn btn-danger">Rentrez trop t&ocirc;t</button>
                                                    @endif
                                                </th>
                                            </tr>
                                            {{ $i++}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">

                        <a href="{{route('agence_A.view_horaire.index')}}">
                            <button class="btn-hover btn waves color-9 button-dashboard">Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var array_length = <?php echo $count; ?>;
        function decor() {
            for (let index = 0; index < array_length; index++) {
                var hourstart = document.getElementById('hourstart'+index).value;
                var hourstop = document.getElementById('hourstop'+index).value;
                if ((hourstop - hourstart) > 11) {
                    var result_start = document.getElementById('block_start'+index);
                    var result_stop = document.getElementById('block_stop'+index);
                    result_start.classList.add("visible");
                    result_stop.classList.add("visible");
                } else if((hourstop - hourstart) < 6) {
                    var result_start = document.getElementById('block_start'+index);
                    var result_stop = document.getElementById('block_stop'+index);
                    result_start.classList.add("none");
                    result_stop.classList.add("none");
                }else{
                    var result_start = document.getElementById('block_start'+index);
                    var result_stop = document.getElementById('block_stop'+index);
                    result_start.classList.add("orange");
                    result_stop.classList.add("orange");
                }
            }
        }
    </script>
</section>
@endsection
