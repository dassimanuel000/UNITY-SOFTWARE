<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i class="zmdi zmdi-home m-r-5"></i>Unity</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user"><i class="zmdi zmdi-account m-r-5"></i>User</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN</li>
                    <li class="@if(Route::currentRouteName() == 'all_product.index') active @endif"> <a href="{{route('all_product.index')}}" class=""><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <li class="{{  'add_client' == request()->path() ? 'active open' : '' }} {{  'list_client' == request()->path() ? 'active open' : '' }} {{  'depot_compte' == request()->path() ? 'active open' : '' }} {{  'client_add' == request()->path() ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-toggle dropdown-btn">
                            <i class="zmdi zmdi-apps"></i><span>Ajouter un client</span>
                        </a>
                        <ul class="ml-menu dropdown-container">
                            <li class="{{  'add_client' == request()->path() ? 'link-dropdown' : '' }}"><a href="{{route('agence_A.add_client.index')}}">Ajouter/Rechercer Un Client</a></li>
                            <li class="{{  'list_client' == request()->path() ? 'link-dropdown' : '' }}"><a href="{{ route('agence_A.list_client.list_client') }}">Liste de clients</a></li>
                            <li class="{{  'depot_compte' == request()->path() ? 'link-dropdown' : '' }}"><a href="{{ route('agence_A.depot_compte') }}">Deposer du Capital</a></li>
                        </ul>
                    </li>
                    <li class="{{  'add_product' == request()->path() ? 'active open' : '' }} {{  'form_add_product' == request()->path() ? 'active open' : '' }} {{  'list_product' == request()->path() ? 'active open' : '' }} {{  'show_product' == request()->path() ? 'active open' : '' }} {{  'search_products' == request()->path() ? 'active open' : '' }} {{  'search_product' == request()->path() ? 'active open' : '' }} {{  'parameter_products' == request()->path() ? 'active open' : '' }} ">
                        <a class="menu-toggle  dropdown-btn" href="javascript:void(0);">
                            <i class="zmdi zmdi-shopping-cart"></i>
                            <span>Produits</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="ml-menu dropdown-container">
                            <li class="{{  'add_product' == request()->path() ? 'link-dropdown' : '' }} {{  'form_add_product' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A.add_product.index')}}">Ajouter un Produit</a></li>
                            <li class="{{  'list_product' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A.list_product.index')}}">liste Produits </a></li>
                            <li class="{{  'search_products' == request()->path() ? 'link-dropdown' : '' }} {{  'search_product' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A.search_product.index')}}">Rechercer un Produit</a></li>
                            <li class="{{  'parameter_products' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A.parameter_products.index')}}">Parametres des Produits</a></li>
                            <li class="{{  'print_list_product' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A.print_list_product.index')}}">Imprimer Tous les Produits en stocks</a></li>
                        </ul>
                    </li>
                    <li class="{{  'horaire' == request()->path() ? 'active open' : '' }} {{  'view_horaire' == request()->path() ? 'active open' : '' }}">
                        <a class="menu-toggle  dropdown-btn" href="javascript:void(0);">
                            <i class="zmdi zmdi-calendar"></i>
                            <span>Gestion des Horaires</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="ml-menu dropdown-container">
                            <li class="{{  'horaire' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A.horaire.index')}}">Inserez les Heures D'arrive et de Depart</a></li>
                            <li class="{{  'view_horaire' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A.view_horaire.index')}}">Voir Les Heures D'arrive et de Depart</a></li>
                        </ul>
                    </li>
                    <li class="{{  'print_facture' == request()->path() ? 'active open' : '' }} {{  'facture_emis' == request()->path() ? 'active open' : '' }}">
                        <a class="menu-toggle  dropdown-btn" href="javascript:void(0);">
                            <i class="zmdi zmdi-forward"></i>
                            <span>Les Factures emises</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="ml-menu dropdown-container">
                            <li class="{{  'print_facture' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A.print_facture.index')}}">Toutes les Factures emises</a></li>
                            <li class="{{  'facture_emis' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A.facture_emis.index')}}">Toutes les Commandes Enregistr&eacute;es</a></li>
                        </ul>
                    </li>
                    <li class="{{ 'agence_A_stock_int' == request()->path() ? 'active open' : '' }} {{ 'agence_A_cash_int' == request()->path() ? 'active open' : '' }} {{ 'agence_A_cash_out' == request()->path() ? 'active open' : '' }} {{ 'agence_A_stock_out' == request()->path() ? 'active open' : '' }}">
                        <a class="menu-toggle  dropdown-btn" href="javascript:void(0);">
                            <i class="zmdi zmdi-money"></i>
                            <span>Comptabilit&eacute;</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="ml-menu dropdown-container">
                            <li class="{{  'agence_A_cash_int' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A_cash_int.index')}}">Toutes les entr&eacute;es de Capitaux</a></li>
                            <li class="{{  'agence_A_cash_out' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A_cash_out.index')}}">Toutes les sorties de Capitaux </a></li>
                            <li class="{{  'agence_A_stock_int' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A_stock_int.index')}}">Toutes les entr&eacute;es de stock</a></li>
                            <li class="{{  'agence_A_stock_out' == request()->path() ? 'link-dropdown' : '' }}"> <a href="{{route('agence_A_stock_out.index')}}">Toutes les sorties de stocks </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            <div class="image"><a href="profile.html"><img src="{{asset('images/profile_av.jpg')}}" alt="User"></a></div>
                            <div class="detail">
                                <h4>Mr Sergio</h4>
                                <small>Engineer BTP</small>
                            </div>
                            <a href="javascript:void(0);" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a>
                            <p class="text-muted">Residence , et informations</p>
                            <div class="row">
                                <div class="col-4">
                                    <h5 class="m-b-5">852</h5>
                                    <small>Following</small>
                                </div>
                                <div class="col-4">
                                    <h5 class="m-b-5">13k</h5>
                                    <small>Followers</small>
                                </div>
                                <div class="col-4">
                                    <h5 class="m-b-5">234</h5>
                                    <small>Post</small>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">Email address: </small>
                        <p>uniteconstruction@gmail.com</p>
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>+ 237 67000000</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li>
                                <div>BTP</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">62% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Managment</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-green " role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%"> <span class="sr-only">87% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>HTML 5</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Chief</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%"> <span class="sr-only">56% Complete</span> </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
