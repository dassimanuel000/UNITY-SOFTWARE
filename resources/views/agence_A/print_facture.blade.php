@extends('agence_A.agence_A')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Factures
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Factures</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">
                        @if (session('horaire'))
                            <div class="alert alert-success" role="alert">
                                {{ session('horaire') }}
                                Merci
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control lonf" id="search" name="search" value="" placeholder="Search.."/>
                        </div>
                        <table id="DataTable" class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th data-breakpoints="sm xs">ID</th>
                                    <th data-breakpoints="sm xs">Matricule de la facture</th>
                                    <th data-breakpoints="sm xs">Nom du client</th>
                                    <th data-breakpoints="sm xs">Total Facture</th>
                                    <th data-breakpoints="sm xs">Date</th>
                                    <th data-breakpoints="sm xs">IMPRIMER</th>
                                </tr>
                            </thead>
                            <tbody id='tbody'>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="hr">
                <hr/>
            </div>
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">

                        <a href="/agence_A">
                            <button class="btn-hover color-9 button-dashboard">FAIRE UNE FACTIURE</button>
                        </a>
                        <a href="/client_add">
                            <button class="btn-hover color-4  button-dashboard">AJOUTER UN CLIENT</button>
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
            xhr.open('GET','{{route('search_print_facture')}}/?search=' + searchValue ,true);
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
