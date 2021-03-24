@extends('dashboard.dashboard')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Salari&eacute;s de L'agence A
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
                        @if (session('delete_employe'))
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('delete_employe') }}
                                    Merci Tout est en regle
                                </div>
                            </div>
                        @endif
                        @if (session('update_employe'))
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('update_employe') }}
                                    Merci Tout est en regle
                                </div>
                            </div>
                        @endif
                        @if (session('employe'))
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('employe') }}
                                    Merci Tout est en regle
                                </div>
                            </div>
                        @endif
                        <h2>Ajouter le nom ou le Matricule Du Salari&eacute; de L'agence A</h2>
                        <br>
                            <div class="form-group">
                                <input type="text" class="form-control lonf" id="search" name="search" value="" placeholder="Search.."/>
                            </div>
                            <table id="DataTable" class="table table-hover m-b-0 table-responsive">
                                <thead>
                                    <tr>
                                        <th data-breakpoints="sm xs">ID</th>
                                        <th data-breakpoints="sm xs">Matricule</th>
                                        <th data-breakpoints="sm xs">Nom</th>
                                        <th data-breakpoints="sm xs">Adresse</th>
                                        <th data-breakpoints="sm xs">Agence</th>
                                        <th data-breakpoints="sm xs">Age </th>
                                        <th data-breakpoints="sm xs">Statut</th>
                                        <th data-breakpoints="sm xs">Poste</th>
                                        <th data-breakpoints="sm xs">Salaire de base</th>
                                        <th data-breakpoints="sm xs">Date de recrutement</th>
                                        <th data-breakpoints="sm xs">Voir</th>
                                        <th data-breakpoints="sm xs">Editer</th>
                                        <th data-breakpoints="sm xs">Supprimer</th>
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
                        <span>.</span>
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
            xhr.open('GET','{{route('search_employe')}}/?search=' + searchValue ,true);
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
