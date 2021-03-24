@extends('agence_A.agence_A')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Stocks
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Stocks</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">
                        <h2>Listes des Produits</h2>
                        <!--------------------------------->
                            <div class="form-group">
                                <input type="text" class="form-control lonf" id="search" name="search" value="" placeholder="Search.."/>
                            </div>
                        <!---->
                        <div class="body table-responsive">
                        @if (session('add_product'))
                            <div class="alert alert-success" role="alert">
                                {{ session('add_product') }}
                            </div>
                        @endif
                            <table id="DataTable" class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th data-breakpoints="sm xs">ID</th>
                                        <th>Image</th>
                                        <th>Referent</th>
                                        <th data-breakpoints="sm xs">Titre</th>
                                        <th data-breakpoints="xs">Description</th>
                                        <th data-breakpoints="sm xs">Categories</th>
                                        <th data-breakpoints="sm xs md">Quantit&eacute;s</th>
                                        <th data-breakpoints="sm xs md">Prix Min</th>
                                        <th data-breakpoints="sm xs md">Prix Max</th>
                                        <th data-breakpoints="sm xs md">Stock D'alarme</th>
                                        <th data-breakpoints="sm xs md">Type du Produit</th>
                                        <th data-breakpoints="sm xs md">Fournisseurs</th>
                                        <th data-breakpoints="sm xs md">Taxes</th>
                                        <th data-breakpoints="sm xs md">Editer</th>
                                        <th data-breakpoints="sm xs md">Modifier</th>
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
                                xhr.open('GET','{{route('search_product')}}/?search=' + searchValue ,true);
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
                <a href="{{ route('agence_A.add_product.index') }}">
                    <button class="btn-hover color-11 button-dashboard">AJOUTER UN PRODUIT</button>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
