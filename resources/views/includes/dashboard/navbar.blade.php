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
                    <li class="@if(Route::currentRouteName() == 'products.index') active @endif"> <a href="{{route('products.index')}}" class=""><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

                    <li @if(preg_match('#agenceA#',Route::currentRouteName())) class="active " @endif class="{{  'Agences' == request()->path() ? 'active open' : '' }} {{  'parametre_agence' == request()->path() ? 'active open' : '' }} ">
                        <a class="menu-toggle  dropdown-btn" href="javascript:void(0);">
                            <i class="zmdi zmdi-shopping-cart"></i>
                            <span>Agences</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="ml-menu dropdown-container">
                            <li class="active @if(Route::currentRouteName() == 'dashboad.stat_agenceA.index') link_route @endif"> <a href="{{route('dashboad.stat_agenceA.index')}}">agence A</a></li>
                            <li> <a href="">agence B</a></li>
                            <li> <a href="">agence C</a></li>
                            <li class="active @if(Route::currentRouteName() == 'dashboad.parametre_agence.index') link_route @endif"> <a href="{{route('dashboad.parametre_agence.index')}}">Parametres des agences</a></li>
                        </ul>
                    </li>
                    <li class="header">Business Intelligence</li>
                    <li class="open {{ 'upgrade' == request()->path() ? 'active open' : '' }} {{ 'add_upgrade' == request()->path() ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-toggle dropdown-btn">
                            <i class="zmdi zmdi-assignment"></i>
                            <span>Performances</span>
                        </a>
                        <ul class="ml-menu dropdown-container">
                            <li class="{{ 'upgrade' == request()->path() ? 'active link-dropdown bold open open' : '' }}"><a href="{{route('upgrade.index')}}">Les Evaluations</a> </li>
                            <li class="{{ 'add_upgrade' == request()->path() ? 'active link-dropdown bold open open' : '' }}"><a href="{{route('add_upgrade.index')}}">Ajouter une Evaluation</a> </li>
                        </ul>
                    </li>
                    <li class="{{  'best_product' == request()->path() ? 'active open' : '' }}">
                        <a href="{{route('dashboad.best_product.index')}}"><i class="zmdi zmdi-copy"></i><span>Meilleurs Produits</span>
                        </a>
                    </li>
                    <li class="{{ 'list_employe' == request()->path() ? 'active open' : '' }} {{ 'voir_employe' == request()->path() ? 'active link-dropdown bold open' : '' }} {{  'add_employe' == request()->path() ? 'active open' : '' }} {{  'salaire_employe' == request()->path() ? 'active open' : '' }} "> <a href="javascript:void(0);" class="menu-toggle dropdown-btn"><i class="zmdi zmdi-grid"></i><span>Les Salari&eacute;s</span> </a>
                        <ul class="ml-menu dropdown-container">
                            <li class="{{  'list_employe' == request()->path() ? 'link-dropdown bold open' : '' }}"> <a href="{{Route('dashboard.list_employe.index')}}">Listes des Salari&eacute;s</a> </li>
                            <li class="{{  'add_employe' == request()->path() ? 'link-dropdown bold open' : '' }}"> <a href="{{Route('dashboard.add_employe.index')}}">Ajouter un Salari&eacute;</a> </li>
                            <li class="{{  'salaire_employe' == request()->path() ? 'link-dropdown bold open' : '' }}"> <a href="{{Route('dashboard.salaire_employe.index')}}">Les Fiches de Payes des Salari&eacute;</a> </li>
                        </ul>
                    </li>
                    <li class="header">EXTRA COMPONENTS</li>
                    <li class="{{  'role-register' == request()->path() ? 'active open' : '' }}">
                        <a href="{{route('dashboad.register.registered')}}"><i class="zmdi zmdi-copy"></i><span>Listes des Utilisateurs</span>
                        </a>
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
