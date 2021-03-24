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
            <div class="col-lg-12 col-md-4 col-sm-12">
                <div class="card">
                    <br><br>
                    <section class="ftco-section-2 ftco-degree-bg">
                        <div class="container d-flex">
                          <div class="section-2-blocks-wrapper row d-flex">
                            <div class="img hover col-lg-4 order-last" style="background-image: url('');background-repeat: no-repeat;">
                                <img src="{{asset('uploads/stock_agence_A/'. $add_product->image) }}" alt="Product" class="img-fluid" />
                            </div>
                            <div class="text col-lg-7 order-first ftco-animate">
                              <div class="text-inner align-self-start">
                                  <BR>
                                <h3 class="heading">Welcome to our website</h3>
                                <p>Referent : {{ $add_product->referent }}.</p>
                                <p> title : {{ $add_product->title }}</p>

                                <p>Descripttion : <br>  {{ $add_product->description }}</p>

                                <ul class="product_price list-unstyled">
                                    <li class="old_price color-green">PRIX MINIMUN : {{ $add_product->price_min }}</li>
                                    <li class="old_price color-red">PRIX MAXIMUN : {{ $add_product->price_max }}</li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <a href="/list_product" style="width:100%;font-size:22px;color:#fff;" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-assignment-return"></i>BACK</a>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
