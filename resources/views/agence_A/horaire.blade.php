@extends('agence_A.agence_A')
@section('content')
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
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card product_item_list">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="panel-body center">
                                <center>
                                    <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle center m-b img-responsive" width="" alt="User"/>
                                </center>
                                <br><br><br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> Inserez les Heures D'arrive et de Depart</th>
                                            </table>
                                        </center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="card product_item_list">
                    <div class="body">
                        @if (session('horaire'))
                            <div class="alert alert-success" role="alert">
                                {{ session('horaire') }}
                                Merci
                            </div>
                        @endif
                        @if (session('add_horaire'))
                            <div class="alert alert-success" role="alert">
                                {{ session('add_horaire') }}
                                Merci
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control lonf" id="search" name="search" value="" placeholder="Search.."/>
                        </div>
                        <div class="table-responsive responsive">
                            <table id="DataTable" class="table responsive table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th data-breakpoints="sm xs">ID</th>
                                        <th data-breakpoints="sm xs">Matricule</th>
                                        <th data-breakpoints="sm xs">Nom</th>
                                        <th data-breakpoints="sm xs">Poste</th>
                                        <th data-breakpoints="sm xs">Date de recrutement</th>
                                        <th data-breakpoints="sm xs">Ajouter les Horaires</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody'>

                                </tbody>
                            </table>
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

                        <a href="{{route('agence_A.view_horaire.index')}}">
                            <button class="btn-hover color-9 button-dashboard">Voir le calendrier des Salari&eacute;s</button>
                        </a>
                        <a href="{{ route('agence_A.horaire.index') }}">
                            <button class="btn-hover color-11 button-dashboard">Listes des Salari&eacute;s</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const search = document.getElementById('search');
        const tableBody = document.getElementById('tbody');
        function getContent(){

        const searchValue = search.value;

            const xhr = new XMLHttpRequest();
            xhr.open('GET','{{route('search_horaire')}}/?search=' + searchValue ,true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {

                if(xhr.readyState == 4 && xhr.status == 200)
                {
                    tableBody.innerHTML = xhr.responseText;
                }
            }
            xhr.send()
        }
        search.addEventListener('input',getContent);
    </script>
</section>
@endsection
