@extends('Magasin_agence_A.Magasin_agence_A')
@section('content')
<script src="{{asset('js/pages/facture.js')}}"></script>
<section class="content ecommerce-page" onmouseover="account()">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Magasin_agence_A
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Magasin_agence_A</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">
                        <h3>SAISSISSEZ LE NOM DU CLIENT OU L'IDENTIFIANT DE LA FACTURE</h3>
                        <div class="form-group">
                            <input type="text" class="form-control lonf" id="search" name="search" value="" placeholder="Search.."/>
                        </div>
                        <div class="body table-responsive">
                            <table id="DataTable" class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th data-breakpoints="sm xs">ID</th>
                                        <th data-breakpoints="sm xs">Identifiant</th>
                                        <th data-breakpoints="sm xs">Nom du client</th>
                                        <th class="compte" data-breakpoints="sm xs">Somme Total</th>
                                        <th data-breakpoints="sm xs">Date</th>
                                        <th data-breakpoints="sm xs">REDUIRE DES STOCKS</th>
                                        <th>DEJA RETIRE</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody'>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script type="text/javascript">
                        const search = document.getElementById('search');
                        const tableBody = document.getElementById('tbody');
                        function getContent(){

                        const searchValue = search.value;

                            const xhr = new XMLHttpRequest();
                            xhr.open('GET','{{route('search_livrason_edit')}}/?search=' + searchValue ,true);
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
