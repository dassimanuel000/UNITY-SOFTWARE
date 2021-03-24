@extends('agence_A.agence_A')
@section('content')
<script src="{{asset('js/jquery.min.js')}}"></script>
<section class="content ecommerce-page" onmouseover="account()">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Clients
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Clients</li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        window.onload = function(event) {
            document.getElementById("loginPopup").style.display="block";
        }
        function openForm() {
          document.getElementById("loginPopup").style.display="block";
        }

        function closeForm() {
          document.getElementById("loginPopup").style.display= "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          var modal = document.getElementById('loginPopup');
          if (event.target == modal) {
            closeForm();
          }
        }
        function account() {
            for (let index = 0; index < 30; index++) {
                const element = [index];
                var account_id_value =  parseInt(document.getElementById("account_id"+index).innerHTML);
                var account_id =  document.getElementById("account_id"+index);
                if (account_id_value < 1000) {
                    account_id.classList.remove("account");
                    account_id.classList.add("account_red");
                } else {
                    account_id.classList.add("account");
                }
            }
        }

      </script>
    <div class="container-fluid" onload="div()">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">
                        <h2>Listes des Clients</h2>

                        <!--<div class="open-btn">
                            <button class="open-button" onclick="openForm()">
                            <strong>Open Form</strong>
                            </button>
                        </div>-->

                        @if (session('client_agence_A'))
                            <div class="alert alert-success" role="alert">
                                {{ session('client_agence_A') }}
                                <b>CLIENT BIEN AJOUTER</b>
                            </div>
                        @endif
                        @if (session('erreur_client'))
                            <div class="alert alert-success" role="alert">
                                {{ session('erreur_client') }}
                                <b>ERREUR DANS L'AJOUT DU CLIENT</b>
                            </div>
                        @endif


                            <div class="form-group">
                                <input type="text" class="form-control lonf" id="search" name="search" value="" placeholder="Search.."/>
                            </div>
                        <!---->
                        <div class="body table-responsive">
                            @php
                                $stateCOMMANDE = DB::table('state')->sum('stateCOMMANDE');
                            @endphp
                        @if ($stateCOMMANDE > 1)
                        <div id="loginPopup">
                            <div class="form-popup" id="popupForm">
                              <div class="form-container">
                                <button type="submit" class="btn btn-success">LA COMMANDE EST ENREGISTEE NORMALEMEMT</button>
                                <button type="button" class="btn btn-success" onclick="closeForm()">Close</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div id="loginPopup">
                            <div class="form-popup" id="popupForm">
                              <div class="form-container">
                                <button type="submit" class="btn btn-danger">AUCUNE MODIFCATION</button>
                                <button type="button" class="btn btn-danger" onclick="closeForm()">Close</button>
                              </div>
                            </div>
                        </div>
                        @endif
                            <table id="DataTable" class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th data-breakpoints="sm xs">ID</th>
                                        <th data-breakpoints="sm xs">Name</th>
                                        <th class="compte" data-breakpoints="sm xs">Compte</th>
                                        <th data-breakpoints="sm xs">adresse</th>
                                        <th data-breakpoints="sm xs">Entreprise</th>
                                        <th data-breakpoints="sm xs">Telephone</th>
                                        <th data-breakpoints="sm xs">UNE COMMANDE</th>
                                        <th data-breakpoints="sm xs"><b>AJOUTER DANS<br> LE COMPTE</b></th>
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
                                xhr.open('GET','{{route('search')}}/?search=' + searchValue ,true);
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
                <a href="{{ route('agence_A.client_add.client_add') }}">
                    <button class="btn-hover color-11 button-dashboard">AJOUTER UN CLIENT</button>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
