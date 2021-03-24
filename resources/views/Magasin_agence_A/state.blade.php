@extends('Magasin_agence_A.Magasin_agence_A')
@section('content')
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
</script>
<section class="content ecommerce-page">
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
            @if (session('Magasin_agence_A'))
                <div class="col-lg-12">
                    <div class="card product_item_list">
                        <div class="body table-responsive">
                            <div class="alert alert-success" role="alert">
                                {{ session('Magasin_agence_A') }}
                                it ok
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
                                                <th> Factures Recentes</th>
                                            </table>
                                            <a href="{{Route('facture_livraision.index')}}" style="text-decoration:none;">
                                                <button type="submit" class="btn-hover color-9 button-dashboard">ADD FACTURES</button>
                                            </a>
                                        </center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card product_item_list">
                    <div class="body table-responsive shadow">
                        <div class="card-body card product_item_list responsive-mg-b-30 ">
                            <div class="panel-body center">
                                <center>
                                    <img src="{{asset('../images/test.png')}}" class="img-circle center m-b img-responsive" width="" alt="User"/>
                                </center>
                                <br><br><br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> Factures dont un retrait a deja ete fait</th>
                                            </table>
                                            <a href="{{Route('facture_livraision_edit.index')}}" style="text-decoration:none;">
                                                <button type="submit" class="btn-hover color-5 button-dashboard">EDIT FACTURES</button>
                                            </a>
                                        </center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <hr>
    </div>
    @php
        $stateCOMMANDE = DB::table('state')->sum('stateAUTRE');
    @endphp
    @if ($stateCOMMANDE > 1)
    <!--<div id="loginPopup">
        <div class="form-popup" id="popupForm" style="background:#fff">
            <section class="banner_area">
                <div class="container">
                    <div class="banner_inner_text">
                        <h2>Recentes</h2>
                        <a href="{{Route('facture_livraision.index')}}" style="text-decoration:none;">
                            <button type="submit" class="btn btn-success">ADD FACTURES</button>
                        </a>
                        <h2>Modifier une Facture</h2>
                        <div class=" product_item">
                            <a href="{{Route('facture_livraision_edit.index')}}" style="text-decoration:none;">
                                <button type="submit" class="btn btn-success">EDIT FACTURES</button>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @else
    <div id="loginPopup">
        <div class="form-popup" id="popupForm">
        <form class="form-container">
            @if ($stateCOMMANDE = 0)
                <button type="reset" class="btn btn-success">FACTURE BIEN ENREGISTRER</button>
            @else
                <button type="submit" class="btn btn-alert">AUCUNE MODIFCATION</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            @endif
        </form>
        </div>
    </div>-->
    @endif
</section>
@endsection
