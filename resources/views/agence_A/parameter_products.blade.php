@extends('agence_A.agence_A')
@section('content')
<section class="content ecommerce-page" onmouseover="tot()">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Les Parametres des Produits
                    <small>Bienvenue sur United Construction</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> United Construction</a></li>
                    <li class="breadcrumb-item active">Les Parametres</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            @if (session('add_family'))
            <div class="col-lg-12 col-md-12">
                <div class="card product_item_list">
                    <div class="body table-responsive shadow">
                        <div class="alert alert-success" role="alert">
                            {{ session('add_family') }}
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
                                    <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle center m-b img-responsive" width="90" alt="User"/>
                                </center>
                                <br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> Les Differentes Familles de Produits</th>
                                            </table>
                                        </center>
                                    </p>
                                </div>
                                <div class="">
                                    <div class="">
                                        @php
                                            $famille = DB::select('select all_familly from list_product ');
                                            $famille_2 = DB::select('select all_familly from list_product2 ');
                                        @endphp
                                    @foreach ($famille as $item)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h5 class="text-justify font-15">
                                            <table class="table table-responsive responsive">
                                                <thead>
                                                    <tr>
                                                        <th>LA FAMILLE </th>
                                                        <th>ACRONYME </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $question = json_decode(($item->all_familly), true);
                                                        $count = count($question);
                                                    @endphp
                                                    @for ($i = 0; $i < $count; $i++)
                                                    <tr>
                                                        <td class="color-grey review-text font-italic m-0">{{ $question[$i]}}</td>
                                                        <td>
                                                            @php
                                                                $arr_0= explode(' ',trim($question[$i]));
                                                                if (count($arr_0)> 1) {
                                                                $output_ = $arr_0[0];
                                                                $output_0 = $arr_0[1];
                                                                echo strtoupper($output_[0]).strtoupper($output_0[0]);
                                                                }else {
                                                                    echo strtoupper($question[$i][0]).strtoupper($question[$i][1]);
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </h5>
                                    </div>
                                    @endforeach
                                    @foreach ($famille_2 as $item_2)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h5 class="text-justify font-15">
                                            <table class="table table-responsive responsive">
                                                <tbody>
                                                    @php
                                                        $question_2 = json_decode(($item_2->all_familly), true);
                                                        $count_2 = count($question_2);
                                                    @endphp
                                                    @for ($i_2 = 0; $i_2 < $count_2; $i_2++)
                                                    <tr>
                                                        <td class="color-grey review-text font-italic m-0">{{ $question_2[$i_2]}}</td>
                                                        <td>
                                                            @php
                                                                $arr_0_2= explode(' ',trim($question_2[$i_2]));
                                                                if (count($arr_0_2)> 1) {
                                                                $output__2 = $arr_0_2[0];
                                                                $output_0_2 = $arr_0_2[1];
                                                                echo strtoupper($output__2[0]).strtoupper($output_0_2[0]);
                                                                }else {
                                                                    echo strtoupper($question_2[$i_2][0]).strtoupper($question[$i_2][1]);
                                                                }
                                                                $arr_1= explode(' ',trim($question_2[$i_2]));
                                                                $product_family = "";
                                                                foreach ($arr_1 as $key_1) {
                                                                    $product_family .= $key_1[0];
                                                                    echo $product_family;
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </h5>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                                <a href="javascript:void()" class="btn btn-primary btn-lg btn-block" onclick="add_family()">Cliquez pour Ajouter une famillle</a>
                                <form action="{{ route('form_add_family') }}" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" id="form_add_family" style="display: none;">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-10 control-label">Ajouter une famille ici</label>
                                            <input type="text" class="form-input input form-control" name="add_family" id="add_family"/>
                                    </div>
                                    <div class="col-md-10 col-md-offset-4">
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="fa fa-btn fa-sign-in"></i>Ajouter
                                        </button>
                                    </div>
                                </form>
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
                                    <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle center m-b img-responsive" width="90" alt="User"/>
                                </center>
                                <br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> Les Differents Types de Produits</th>
                                            </table>
                                        </center>
                                    </p>
                                </div>
                                <div class="">
                                    <div class="">
                                        @php
                                            $all_type  = DB::select('select all_type from list_product ');
                                            $all_type_2  = DB::select('select all_type from list_product2 ');
                                        @endphp
                                    @foreach ($all_type  as $item_all_type)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h5 class="text-justify font-15">
                                            <table class="table table-responsive responsive">
                                                <thead>
                                                    <tr>
                                                        <th>LA FAMILLE </th>
                                                        <th>ACRONYME </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $type = json_decode(($item_all_type->all_type), true);
                                                        $count_type = count($type);
                                                    @endphp
                                                    @for ($i_type = 0; $i_type < $count_type; $i_type++)
                                                    <tr>
                                                        <td class="color-grey review-text font-italic m-0">{{ $type[$i_type]}}</td>
                                                        <td>
                                                            @php
                                                                $arr_1= explode(' ',trim($type[$i_type]));
                                                                if (count($arr_1)> 1) {
                                                                $output_1 = $arr_1[0];
                                                                $output_2 = $arr_1[1];
                                                                if (!empty($output_2)) {
                                                                    echo strtoupper($output_1[0]).strtoupper($output_2[0]);
                                                                }
                                                                }else {
                                                                    echo strtoupper($type[$i_type][0]).strtoupper($type[$i_type][1]);
                                                                }
                                                            @endphp
                                                            @php
                                                                //$arr_1= explode(' ',trim($type[$i_type]));
                                                                //$output_1 = $arr_1[0];
                                                                //$output_2 = $arr_1[1];
                                                            @endphp
                                                            {{ strtoupper(' ')/*.strtoupper($output_2[0])*/}}
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </h5>
                                    </div>
                                    @endforeach
                                    @foreach ($all_type_2  as $item_all_type_2)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h5 class="text-justify font-15">
                                            <table class="table table-responsive responsive">
                                                <tbody>
                                                    @php
                                                        $type_2 = json_decode(($item_all_type_2->all_type), true);
                                                        $count_type_2 = count($type_2);
                                                    @endphp
                                                    @for ($i_type_2 = 0; $i_type_2 < $count_type_2; $i_type_2++)
                                                    <tr>
                                                        <td class="color-grey review-text font-italic m-0">{{ $type_2[$i_type_2]}}</td>
                                                        <td>
                                                            @php
                                                                $arr_1_2= explode(' ',trim($type_2[$i_type_2]));
                                                                if (count($arr_1_2)> 1) {
                                                                $output_1_2 = $arr_1_2[0];
                                                                $output_2_2 = $arr_1_2[1];
                                                                if (!empty($output_2_2)) {
                                                                    echo strtoupper($output_1_2[0]).strtoupper($output_2_2[0]);
                                                                }
                                                                }else {
                                                                    echo strtoupper($type_2[$i_type_2][0]).strtoupper($type_2[$i_type_2][1]);
                                                                }
                                                            @endphp
                                                            @php
                                                                //$arr_1= explode(' ',trim($type[$i_type]));
                                                                //$output_1 = $arr_1[0];
                                                                //$output_2 = $arr_1[1];
                                                            @endphp
                                                            {{ strtoupper(' ')/*.strtoupper($output_2[0])*/}}
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </h5>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                                <a href="javascript:void()" class="btn btn-primary btn-lg btn-block" onclick="add_type()">Cliquez pour Ajouter un Type</a>
                                <form action="{{ route('form_add_type') }}" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" id="form_add_type" style="display: none;">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-10 control-label">Ajouter un Type ici</label>
                                            <input type="text" class="form-input input form-control" name="add_type" id="add_type"/>
                                    </div>
                                    <div class="col-md-10 col-md-offset-4">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-sign-in"></i>Ajouter
                                        </button>
                                    </div>
                                </form>
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
                                    <img src="{{asset('images/image-gallery/Finance.png')}}" class="img-circle center m-b img-responsive" width="90" alt="User"/>
                                </center>
                                <br>
                                <div class="list" style="margin-left: 1%;list-style:none;">
                                    <p class="m-b-0 margin10 padding p12">
                                        <center>
                                            <table style="text-align: center;">
                                                <th> Les Differentes Cat&eacute;gories de Produits</th>
                                            </table>
                                        </center>
                                    </p>
                                </div>
                                <div class="">
                                    <div class="">
                                        @php
                                            $Cat = DB::select('select all_categorie from list_product ');
                                            $Cat_2 = DB::select('select all_categorie from list_product2 ');
                                        @endphp
                                    @foreach ($Cat as $item_Cat)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h5 class="text-justify font-15">
                                            <table class="table table-responsive responsive">
                                                <thead>
                                                    <tr>
                                                        <th>LA FAMILLE </th>
                                                        <th>ACRONYME </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $_Cat = json_decode(($item_Cat->all_categorie), true);
                                                        $count_Cat = count($_Cat);
                                                    @endphp
                                                    @for ($i_Cat = 0; $i_Cat < $count_Cat; $i_Cat++)
                                                    <tr>
                                                        <td class="color-grey review-text font-italic m-0">{{ $_Cat[$i_Cat]}}</td>
                                                        <td>
                                                            @php
                                                                //$condition2 = ctype_space($_Cat[$i_Cat]);
                                                                $arr_3= explode(' ',trim($_Cat[$i_Cat]));
                                                                if (count($arr_3)> 1) {
                                                                    $output_3 = $arr_3[0];
                                                                    $output_4 = $arr_3[1];

                                                                    if (!empty($output_4)) {
                                                                        echo strtoupper($output_3[0]).strtoupper($output_4[0]);
                                                                    }
                                                                }else {
                                                                    //$arr_3= explode(' ',trim($_Cat[$i_Cat]));
                                                                    //$output_3= $arr_3[0];
                                                                    //echo strtoupper($output_3[0]).strtoupper($output_3[1]);
                                                                    echo strtoupper($_Cat[$i_Cat][0]).strtoupper($_Cat[$i_Cat][1]);;
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </h5>
                                    </div>
                                    @endforeach
                                    @foreach ($Cat_2 as $item_Cat_2)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h5 class="text-justify font-15">
                                            <table class="table table-responsive responsive">
                                                <tbody>
                                                    @php
                                                        $_Cat_2 = json_decode(($item_Cat_2->all_categorie), true);
                                                        $count_Cat_2 = count($_Cat_2);
                                                    @endphp
                                                    @for ($i_Cat_2 = 0; $i_Cat_2 < $count_Cat_2; $i_Cat_2++)
                                                    <tr>
                                                        <td class="color-grey review-text font-italic m-0">{{ $_Cat_2[$i_Cat_2]}}</td>
                                                        <td>
                                                            @php
                                                                //$condition2 = ctype_space($_Cat[$i_Cat]);
                                                                $arr_3_2= explode(' ',trim($_Cat_2[$i_Cat_2]));
                                                                if (count($arr_3_2)> 1) {
                                                                    $output_3_2 = $arr_3_2[0];
                                                                    $output_4_2 = $arr_3_2[1];

                                                                    if (!empty($output_4_2)) {
                                                                        echo strtoupper($output_3_2[0]).strtoupper($output_4_2[0]);
                                                                    }
                                                                }else {
                                                                    //$arr_3= explode(' ',trim($_Cat[$i_Cat]));
                                                                    //$output_3= $arr_3[0];
                                                                    //echo strtoupper($output_3[0]).strtoupper($output_3[1]);
                                                                    echo strtoupper($_Cat_2[$i_Cat_2][0]).strtoupper($_Cat_2[$i_Cat_2][1]);;
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </h5>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                                <a href="javascript:void()" class="btn btn-primary btn-lg btn-block" onclick="add_categorie()">Cliquez pour Ajouter une Categorie</a>
                                <form action="{{ route('form_add_categorie') }}" method="GET" enctype="multipart/form-data" class="form-horizontal" role="form" id="form_add_categorie" style="display: none;">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-10 control-label">Ajouter une Categorie ici</label>
                                        <input type="text" class="form-input input form-control" name="add_categorie" id="add_categorie"/>
                                    </div>
                                    <div class="col-md-10 col-md-offset-4">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-sign-in"></i>Ajouter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr">
                <hr/>
            </div>
            <div class="col-md-7">
                <a href="{{Route('all_product.index')}}">
                    <button class="btn btn-danger">
                        <i class="fa fa-btn fa-sign"></i>Bacl
                    </button>
                </a>
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
</script>

<script>
    function add_family() {
        document.getElementById("form_add_family").style.display="block";
    }
    function add_type() {
        document.getElementById("form_add_type").style.display="block";
    }
    function add_categorie() {
        document.getElementById("form_add_categorie").style.display="block";
    }
</script>

</section>
@endsection
