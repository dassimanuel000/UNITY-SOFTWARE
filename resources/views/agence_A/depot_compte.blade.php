@extends('agence_A.agence_A')
@section('content')
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Depots de Capitaux dans l'entreprise
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Depots </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            @if (session('depot_compte'))
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <div class="alert alert-success" role="alert">
                                {{ session('depot_compte') }}
                                Tout est ok
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
                                                <th> Deposer sereinement des capitaux chez United Construction</th>
                                            </table>
                                        </center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="card product_item_list">
                    <div class="body table-responsive shadow1">
                        <h5>Choississez le client qui veut deposer de l'argent</h5>
                        <div class="form-group">
                            <div class="menu">
                                <ul class="list" style="list-style:none">
                                    <li class="hidden-sm-down">
                                        <div class="input-group">
                                            <input type="text" class="form-control lonf" id="search" name="search" value="" placeholder="Search.."/>
                                            <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table">
                            <table id="DataTable" class="table table-hover m-b-0">
                                <thead>
                                    <tr>

                                    </tr>
                                </thead>
                                <tbody id='tbody'>

                                </tbody>
                            </table>
                        </div>
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
            xhr.open('GET','{{route('search_compte')}}/?search=' + searchValue ,true);
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
