@extends('dashboard_boss')
@section('content')
    <!-- Main Content -->
    <section class="content ecommerce-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard
                        <small>Bienvenue sur United Construction</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="zmdi zmdi-home"></i> United Construction</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Bilan</strong> Ventes</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body product-report">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon xl-slategray m-b-20"><i class="zmdi zmdi-chart-donut"></i></div>
                                    <div class="col-in">
                                        <small class="text-muted m-t-0">Bilan des ventes</small>
                                        <h3 class="counter m-b-0">$4,516</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon xl-slategray m-b-20"><i class="zmdi zmdi-chart"></i></div>
                                    <div class="col-in">
                                        <small class="text-muted m-t-0">Revenue annuel </small>
                                        <h3 class="counter m-b-0">$6,481</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon xl-slategray m-b-20"><i class="zmdi zmdi-card"></i></div>
                                    <div class="col-in">
                                        <small class="text-muted m-t-0">Benefice total</small>
                                        <h3 class="counter m-b-0">$3,915</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="sales-bars-chart m-t-20" style="height: 300px;"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Commandes</strong> Reçues</h2>
                        </div>
                        <div class="body">
                            <h3 class="m-b-0">47,012</h3>
                            <small class="displayblock">23% Average <i class="zmdi zmdi-trending-up"></i></small>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(63, 81, 181)" data-highlight-Line-Color="#222"
                             data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(63, 81, 181)" data-spot-Color="rgb(63, 81, 181, 0.7)"
                             data-offset="90" data-width="100%" data-height="40px" data-line-Width="1" data-line-Color="rgb(63, 81, 181, 0.7)"
                             data-fill-Color="rgba(0,0,0, 0.2)"> 1,2,3,1,4,3,6,4,4,1 </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Ventes</strong> totales</h2>
                        </div>
                        <div class="body">
                            <h3 class="m-b-0">512</h3>
                            <small class="displayblock">18% Average <i class="zmdi zmdi-trending-down"></i></small>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(63, 81, 181)" data-highlight-Line-Color="#222"
                             data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(120, 184, 62)" data-spot-Color="rgb(63, 81, 181, 0.7)"
                             data-offset="90" data-width="100%" data-height="40px" data-line-Width="1" data-line-Color="rgb(63, 81, 181, 0.7)"
                             data-fill-Color="rgba(0,0,0, 0.2)"> 4,5,2,8,4,8,7,4,8,5</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Revenue</strong></h2>
                        </div>
                        <div class="body">
                            <h3 class="m-b-0">1,612</h3>
                            <small class="displayblock">13% Average <i class="zmdi zmdi-trending-up"></i></small>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(63, 81, 181)" data-highlight-Line-Color="#222"
                             data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(120, 184, 62)" data-spot-Color="rgb(63, 81, 181, 0.7)"
                             data-offset="90" data-width="100%" data-height="40px" data-line-Width="1" data-line-Color="rgb(63, 81, 181, 0.7)"
                             data-fill-Color="rgba(0,0,0, 0.2)">1,5,9,3,5,7,8,5,2,3,5,7</div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Bilan</strong> Annuel <small><strong>Note:</strong> Contrary to popular belief, Lorem Ipsum is not simply random text.</small></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="area_chart" class="graph"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card tasks_report">
                        <div class="header">
                            <h2><strong>Revenue </strong>Total</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu slideUp float-right">
                                        <li><a href="javascript:void(0);">Edit</a></li>
                                        <li><a href="javascript:void(0);">Delete</a></li>
                                        <li><a href="javascript:void(0);">Report</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body text-center">
                            <h4 class="m-t-0">Vente totale</h4>
                            <h6 class="m-b-20">2,45,124</h6>
                            <input type="text" class="knob dial1" value="66" data-width="140" data-height="140" data-thickness="0.1" data-fgColor="#000" readonly>
                            <h6 class="m-t-30">Satisfaction Rate</h6>
                            <small class="displayblock">47% Average <i class="zmdi zmdi-trending-up"></i></small>
                            <div class="sparkline m-t-20" data-type="bar" data-width="97%" data-height="45px" data-bar-Width="2" data-bar-Spacing="8" data-bar-Color="#000">3,2,6,5,9,8,7,8,4,5,1,2,9,5,1,3,5,7,4,6</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Ventes </strong>Recentes</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive members_profiles">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Nom</th>
                                    <th>Article</th>
                                    <th>Addresse</th>
                                    <th>Quantite</th>
                                    <th>Statut</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Hossein</td>
                                    <td>IPONE-7</td>
                                    <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                                    <td>3</td>
                                    <td><span class="badge badge-success">DONE</span></td>
                                </tr>
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Camara</td>
                                    <td>NOKIA-8</td>
                                    <td>2595 Pearlman Avenue Sudbury, MA 01776 </td>
                                    <td>3</td>
                                    <td><span class="badge badge-default">Delivered</span></td>
                                </tr>
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Maryam</td>
                                    <td>NOKIA-456</td>
                                    <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                                    <td>4</td>
                                    <td><span class="badge badge-success">DONE</span></td>
                                </tr>
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Micheal</td>
                                    <td>SAMSANG PRO</td>
                                    <td>508 Virginia Street Chicago, IL 60653</td>
                                    <td>1</td>
                                    <td><span class="badge badge-success">DONE</span></td>
                                </tr>
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Frank</td>
                                    <td>NOKIA-456</td>
                                    <td>1516 Holt Street West Palm Beach, FL 33401</td>
                                    <td>13</td>
                                    <td><span class="badge badge-warning">PENDING</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
