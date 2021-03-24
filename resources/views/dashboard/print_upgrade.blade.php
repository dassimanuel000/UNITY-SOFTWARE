<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="Stock management template" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--STYLES
        <title>{{ config('app.name', 'Laravel') }}</title>
    -->
    <title>United Construction</title>
    <!--STYLES-->
    @include('includes.dashboard.styles')
    </head>
    <style>
        .nonen{
            display: none;
            visibility: hidden;
        }
    </style>
    <body class="theme-purple">
    <!-- Page Loader -->
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div id="print">
                                <div class="div-center">
                                    <div class="gauce">
                                        <div class="img">
                                            <img src="{{asset('images/test.png')}}" alt="Unity" srcset="" class="img-respomsable img-fluid">
                                        </div>
                                    </div>
                                    <div class="cwentre">
                                        <div class="col-lg-12 col-md-10 col-sm-12">
                                            <br>
                                            <h2>
                                                <small>United Construction</small>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="drpote">
                                        <div class="streamline b-accent">
                                            <div class="sl-item">
                                                <div class="sl-content ladate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row center text-center  text">
                                        <h3 class="center text-center  text" style="text-align: center;margin-left: 10%;">
                                            Questionnaire de validation
                                        </h3>
                                    </div>
                                </div>
                                <br>
                                <div class="col-11 m-b-1 m-p-1">
                                    @php
                                       $question = json_decode(($print_upgrade->question), true);
                                    @endphp
                                    @for ($i = 0; $i < 10; $i++)
                                        <div class="col-10 m-b-0 m-b-0" style="margin-left: 2%;">
                                            <div class="row">
                                                <h6 class="text-justify green">Question {{ $i+1}}</h6>
                                                <br>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <p class="text-title">
                                                    <li>
                                                        {{ $question[$i] }}
                                                    </li>
                                                </p>
                                                    <div class="fm-checkbox "">
                                                        <div class="checkbox">
                                                            <input type="checkbox">
                                                            <label>Mediocre</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox">
                                                            <label>Passable</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox">
                                                            <label>Bonne</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox">
                                                            <label>Excellente</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 md-10 lg-12 m-p-1">
            <button type="submit" class="btn-dashboard btn btn-lg btn-block btn-success" onclick="printF()" id="putain"> IMPRIMER</button>
        </div>
        <script>
            function prins() {
                window.print();
            }
            function dispar() {
                var repar = document.getElementById('putain');
                repar.classList.add("nonen");
                document.getElementById("putain").style.display="none";
            }
            function printF() {
                var none = document.getElementById('putain');
                none.classList.add("nonen");

                if (confirm('Are you sure ? ') == true) {
                    setTimeout(prins, 50);
                } else {
                    setTimeout(dispar, 5000);
                }
                setTimeout(dispar, 50);
            }
        </script>
    </body>
</html>
