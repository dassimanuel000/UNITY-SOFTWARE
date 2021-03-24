<?php

namespace App\Http\Controllers\agence_A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\client_agence_A;
use App\add_product;
use App\stock_agence_A;
use App\facture;
use App\FactureCommande;
use App\facture_emis;
use App\cash_int_a;
use DB;
use Cart;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;


class factureController extends Controller
{
    //
    public function index(){
        $stateCOMMANDE = DB::update('update state set stateCOMMANDE = 0 where idstate = 2');
        return view('agence_A.facture');

    }

    public function commande(Request $request, $id_client){

        $client_agence_A = client_agence_A::find($id_client);
        $stateCOMMANDE = DB::update('update state set stateCOMMANDE = 0 where idstate = 2');
        return view('agence_A.commande')->with('client_agence_A',$client_agence_A);

    }
    public function account(Request $request, $id_client)
    {
        $account = client_agence_A::find($id_client);
        $stateCOMMANDE = DB::update('update state set stateCOMMANDE = 0 where idstate = 2');
        return view('agence_A.account')->with('account',$account);
    }
    public function account_commande(Request $request, $id_client)
    {
        $id_clientDB = client_agence_A::find($id_client);
        $id_client = $id_clientDB->id_client;
        if ($id_clientDB) {
            $id_clientDB->account_client += $request->input('account_client');
            $id_clientDB->save();
            $stateCOMMANDE = DB::update('update state set stateCOMMANDE = 0 where idstate = 2');
            return redirect('/commande/'.$id_client.'')->with('id_client', 'Compte OK');
        } else {
            return redirect('/add_client')->with('id_client', 'Compte PROBLEME');
        }

    }
    public function account_commande_update(Request $request, $id_client)
    {
        $id_clientDB = client_agence_A::find($id_client);
        $id_client = $id_clientDB->id_client;
        if ($id_clientDB) {
            $id_clientDB->account_client += $request->input('account_client_update');
            $id_clientDB->save();
            $stateCOMMANDE = DB::update('update state set stateCOMMANDE = 0 where idstate = 2');
            return redirect('/commande/'.$id_client.'')->with('id_account_client_update', 'Compte Modifie');
        } else {
            return redirect('/add_client')->with('id_account_client_update', 'Compte PROBLEME');
        }
    }
    public function destroy_cart()
    {
        Cart::destroy();
        return view('agence_A.add_client');
    }
    public function search_client(Request $request){

        //$client_agence_A = client_agence_A::findOrfail($id);

       if($request->ajax()){

         $output="";
         $products = add_product::where('referent','LIKE','%'.$request->search."%")
                                    ->Orwhere('title','LIKE','%'.$request->search."%")
                                    ->Orwhere('description','LIKE','%'.$request->search."%")
                                    ->Orwhere('product_type','LIKE','%'.$request->search."%")
                                    ->Orwhere('category','LIKE','%'.$request->search."%")
                                    ->get();

         if($products){

            $inx = 0;

            foreach ($products as  $row) {

             $output.='<div class="col-lg-3 col-md-4 col-sm-12">'.
                             '<div class="card product_item">'.
                                '<div class="body" onmouseover="idClient()">'.
                                    '<div class="cp_img">'.
                                        '<img class="img-fluid2 img-fluid" src="../uploads/stock_agence_A/'.$row->image.'">'.
                                        '<div class="hover">'.
                                            '<form action="/shopping_cart" method="post">'.
                                                '<input type="hidden" name="_token" id="" value="'.csrf_token().'"/>'.
                                                //'<input type="hidden" name="field" id="" value="'.csrf_field().'"/>'.
                                                //'<input type="hidden" name="met" id="" value="'.method_field('post').'"/>'.
                                              //method_field('post').
                                            '<div style="display:none">'.
                                                '<input type="number" name="id_product" id="product_id" value="'.$row->id.'"/>'.
                                                '<input type="text" name="title_product" id="title_product" value="'.$row->title.'"/>'.
                                                '<input type="number" name="price_min_product" id="price_min_product" value="'.$row->price_min.'"/>'.
                                                '<input type="number" name="price_max_product" id="price_max_product" value="'.$row->price_max.'"/>'.
                                                '<input type="number" name="taxe_product" id="taxe_product" value="1"/>'.
                                                '<input type="number" name="idClient" id="idClient'.$inx.'" value="" required/>'.
                                            '</div>'.
                                            '<input type="submit" class="btn btn-primary btn-sm waves-effect" name="add_to_cart_name" onclick="id_Client()" id="add_to_cart" value="AJOUTER"/>'.
                                            '</form>'.
                                            //'<a href="javascript:void(0);" class="btn btn-danger btn-sm waves-effect"><i class="zmdi zmdi-assignment-return"></i></a>'.
                                        '</div>'.
                                    '</div>'.
                                    '<br>'.
                                    '<div class="product_details">'.
                                        '<h5>'.'<button class="btn btn-white" type="text">'.$row->title.'</button>'.
                                        '<ul class="product_price list-unstyled">'.
                                            '<button class="btn btn-white">'.$row->price_min.' Fcfa</button>'.
                                            '<button class="btn btn-white">'.$row->quantity.'  en stocks</button>'.
                                        '</ul>'.
                                    '</div>'.
                                    '<script>var arra = 0; arra +='.$inx.';console.log(arra);</script>'.
                                '</div>'.
                            '</div>'.
                        '</div>';
                $inx++;
            }
            return $output;

         }
        }

    }

    public function shopping_cart(Request $request){

        //Cart::add($request->id_product, $request->title_product, 1, $request->price_min_product);
        //Cart::add($request->id_product, $request->title_product, 1, $request->price_min_product);idClient

        $facture = new facture();

        $facture->nameProduct = $request->input('title_product');
        $facture->idClient = $request->input('idClient');
        $facture->quantityProduct = $request->input('id_product');
        $facture->priceMinProduct = $request->input('price_min_product');
        $facture->priceMaxProduct = $request->input('price_max_product');
        $facture->taxeProduct = $request->input('taxe_product');

        $facture->save();

        return redirect()->back();//->with($facture);

    }
    public function delete_facture(){
        $delete_facture = DB::delete('DELETE FROM facture;');
        //$delete_facture->delete();
        return view('agence_A.add_client');
    }

    /*public function facture_print(Request $request, $id_client){
        $facture = client_agence_A::find($id_client);

        return view('agence_A.facture_print')->with('facture_print',$facture);
    }*/

    public function update_facture(Request $request, $idFacture)
    {
        $facture = facture::find($idFacture);
        if ($facture) {
            $facture->priceMinProduct = $request->input('price_min_facture');
            $facture->taxeProduct = $request->input('taxe_product');
            $facture->save();
            return redirect('/commande/'.$facture->idClient.'');
        } else {
            return redirect('/commande/'.$facture->idClient.'');
        }

    }
    public function change_state(Request $request)
    {
        $condition = DB::table('facture')->pluck('idClient')->all();

        if ($condition) {
            $idClient = DB::table('facture')->avg('idClient');
            //$idClient = json_decode(json_encode($idClient), true);
            //$idClient = $idClient[0];
            //$idClient = DB::table('facture')->pluck('idClient')->all();
            //$idClient = json_encode($idClient);
            //$idClient = $idClient[0];

            $nameClient = client_agence_A::where('id_client','LIKE','%'.$idClient."%")->pluck('name_client');
            $nameClient = json_encode($nameClient);
            //$name_user = DB::select('select name_client from client_agence_A where id_client = '.($idClient).' ');
            $name_user = client_agence_A::where('id_client','LIKE','%'.$idClient."%")->pluck('name_client');

            $account_client = client_agence_A::where('id_client','LIKE','%'.$idClient."%")->pluck('account_client');

            $id_clientDB = client_agence_A::find($idClient);
            $idClient_facture = $id_clientDB->identifiantFacture;
            $idClient_plus = $idClient_facture + $idClient;
            $idClient_plus = $idClient_plus + 1;

            //$identifiantFacture = 'A';

            /*foreach ($name_user as $key) {
                $identifiantFacture = $identifiantFacture.$key;
            }*/
            //$identifiantFacture = //(Auth::user()->initial_agence).date('s').date('i').date('H').date('Y').date('m').date('d').strtoupper($idClient_plus);
            $identifiantFacture = $request->input('identifiant');

            $allProduct = DB::table('facture')->pluck('nameProduct')->all();
            $allProduct = json_encode($allProduct);

            $allQuantityCommande = DB::table('facture')->pluck('taxeProduct')->all();
            $count_allQuantityCommande = count($allQuantityCommande);
            $allQuantityCommande = json_encode($allQuantityCommande);

            $allQuantityRetire = 0;

            $allPriceUnitaire = DB::table('facture')->pluck('priceMinProduct')->all();
            $allPriceUnitaire = json_encode($allPriceUnitaire);

            $count = DB::table('facture')->count('priceMinProduct');
            $allPriceTotal = array();

            $allPrix = DB::table('facture')->pluck('priceMinProduct')->all();
            $allPrix = json_decode(json_encode($allPrix), true);
            $allQTE = DB::table('facture')->pluck('taxeProduct')->all();
            $allQTE = json_decode(json_encode($allQTE), true);

            $allPriceTotal = array_map(function($x, $u){ return $x * $u; }, $allQTE, $allPrix);
            $totalFacture = array_sum($allPriceTotal);

            $resteCompte = $account_client[0] - $totalFacture;

            $allPriceTotal = json_encode($allPriceTotal);

            $remise = 0;

            $update = 1;

            $totalCommande = DB::table('facture')->sum('taxeProduct');

            $FactureCommande = new FactureCommande();
            $FactureCommande->identifiantFacture = $identifiantFacture;
            $FactureCommande->nameClient = $nameClient;
            $FactureCommande->idClient = $idClient;
            $FactureCommande->allProduct = $allProduct;
            $FactureCommande->allQuantityCommande = $allQuantityCommande;
            $FactureCommande->allQuantityRetire = $allQuantityRetire;
            $FactureCommande->allPriceUnitaire = $allPriceUnitaire;
            $FactureCommande->allPriceTotal = $allPriceTotal;
            $FactureCommande->remise = $remise;
            $FactureCommande->update = $update;
            $FactureCommande->totalCommande = $totalCommande;
            $FactureCommande->totalFacture = $totalFacture;

            $FactureCommande->save();

            if ($FactureCommande) {
                $facture_emis = new facture_emis();
                $facture_emis->identifiantFacture = $identifiantFacture;
                $facture_emis->nameClient = $nameClient;
                $facture_emis->idClient = $idClient;
                $facture_emis->allProduct = $allProduct;
                $facture_emis->allQuantityCommande = $allQuantityCommande;
                $facture_emis->allPriceUnitaire = $allPriceUnitaire;
                $facture_emis->allPriceTotal = $allPriceTotal;
                $facture_emis->remise = $remise;
                $facture_emis->totalCommande = $totalCommande;
                $facture_emis->totalFacture = $totalFacture;
                $facture_emis->autre = '';
                $facture_emis->save();
            }

            if ($facture_emis) {

                $cash_int_a = new cash_int_a();
                $cash_int_a->id_mere = count($test = DB::select('select * from FactureCommande'));
                $cash_int_a->id_client = $idClient;
                $cash_int_a->name_client = $nameClient;
                $cash_int_a->id_facture = $identifiantFacture;
                $cash_int_a->referent = $allProduct;
                $cash_int_a->title = 'FACTURE EFFECTUE';
                $cash_int_a->type = 'COMMANDE';
                $cash_int_a->quantity = $count_allQuantityCommande;
                $cash_int_a->price_int = $request->input('price_int');
                $cash_int_a->total_int = $totalFacture;
                $cash_int_a->jour_int = DATE('d');
                $cash_int_a->mois_int = DATE('M');
                $cash_int_a->date_int = date('Y-m-d H:i:s');
                $cash_int_a->facture = json_encode($FactureCommande);
                $cash_int_a->save();

                $stateCOMMANDE = DB::update('update state set stateCOMMANDE = 1 where idstate = 2');
                $stateCOMMANDE = DB::update('update state set stateAUTRE = 1 where idstate = 1');
                $stateCOMMANDE = DB::update('update state set stateAUTRE = 1 where idstate = 2');
                $compte = DB::update('update client_agence_A set account_client = '.$resteCompte.' where id_client = '.$idClient.'');
                $identif = DB::update('update client_agence_A set identifiantFacture = '.(($idClient_facture)+1).' where id_client = '.$idClient.'');
                $delete_facture = DB::delete('DELETE FROM facture;');
                return view('agence_A.add_client')->with('stateCOMMANDE','stateCOMMANDE');
            } else {
                return view('agence_A.add_client')->with('stateCOMMANDES');
            }
        }
        else {
            return view('agence_A.add_client')->with('state_ERREUR');
        }
        //return ($resteCompte.'='.($idClient_facture+1).'='.$identifiantFacture.'='.$nameClient.'----'.$idClient.'----'.$allProduct.'----'.$allQuantityCommande.'----'.$allQuantityRetire.'----'.$allPriceUnitaire.'----'.$allPriceTotal.'----'.$remise.'----'.$totalCommande.'----'.$totalFacture);


        //return ($resteCompte.'='.$nameClient.'----'.$idClient.'----'.$allProduct.'----'.$allQuantityCommande.'----'.$allQuantityRetire.'----'.$allPriceUnitaire.'----'.$allPriceTotal.'----'.$remise.'----'.$totalCommande.'----'.$totalFacture);
        //return ($resteCompte.'='.$nameClient[0].'----'.$idClient.'----'.$allProduct[0].'----'.$allQuantityCommande[0].'----'.$allQuantityRetire.'----'.$allPriceUnitaire[0].'----'.$allPriceTotal[0].'----'.$remise.'----'.$totalCommande.'----'.$totalFacture);

    }

    public function print_facture()
    {
        return view('agence_A.print_facture');
    }

    public function search_print_facture(Request $request)
    {
      if($request->ajax()){

         $output="";
         $i=0;

         $search_print_facture = facture_emis::where('nameClient','LIKE','%'.$request->search."%")
                                            ->Orwhere('identifiantFacture','LIKE','%'.$request->search."%")
                                            ->get();

         if($search_print_facture){

            foreach ($search_print_facture as  $product) {

            $nameClient = json_decode(($product->nameClient), true);
            $nameClient = $nameClient[0];

             $output.='<tr>'.

             '<td>'.'<span class="text-muted">'.$product->idfacture_emis.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->identifiantFacture.'</span>'.'</td>'.

             '<td>'.$nameClient.'</td>'.

             '<td>'.$product->totalFacture.'</td>'.

             '<td>'.Carbon::parse($product->created_at)->diffforHumans().'<br> Fait le :'.(date('d F Y', strtotime($product->created_at))).'<br> Modifie le :'.date('d F Y H:i:s', strtotime($product->updated_at)).'</td>'.

             '<td>'.
                '<a href="/facture_emis_commande/'.$product->idfacture_emis.'" class="btn btn-primary waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-camera">'.'</i>'.'</a>'.
             '</td>'.

             '</tr>';

              $i++;
            }
            return $output;

         }

       }
    }

    public function facture_emis()
    {
        $facture_emis = DB::table('facture_emis')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(99999);
        return view('agence_A.facture_emis')->with('facture_emis',$facture_emis);
    }

    public function facture_emis_commande($idfacture_emis)
    {
        $facture_emis_commande = facture_emis::find($idfacture_emis);
        return view('agence_A.facture_emis_commande')->with('facture_emis_commande',$facture_emis_commande);
    }


    ///////////////////////////////////////////////////////////////////

    public function live_commande()
    {
        return view('agence_A.live_commande');
    }

    public function search_live_commande(Request $request){

    if($request->ajax()){

    $output1="";
    $products = add_product::where('referent','LIKE','%'.$request->search."%")
                                ->where('quantity','>',1)
                                ->Orwhere('title','LIKE','%'.$request->search."%")
                                ->Orwhere('description','LIKE','%'.$request->search."%")
                                ->Orwhere('product_type','LIKE','%'.$request->search."%")
                                ->Orwhere('category','LIKE','%'.$request->search."%")
                                ->get();

    if($products){

        $inx = 0;
        $idClient = DB::select('select * from client_agence_A');
        $idClient = count($idClient);
        $idClient = $idClient + 1;

        foreach ($products as  $row) {

        $output1.='<tr>'.
                    '<td><img src="../uploads/stock_agence_A/'.$row->image.'" width="48" alt="User"></td>'.
                    '<td><h5> '.$row->title.'</h5></td>'.
                    '<td><span class="text-muted">'.$row->price_min.' Fcfa</span></td>'.
                    '<td>'.$row->quantity.'</td>'.
                    '<td>'.
                        '<form action="/add_cart" method="post">'.
                            '<input type="hidden" name="_token" id="" value="'.csrf_token().'"/>'.
                            '<div style="display:none">'.
                                '<input type="number" name="id_product" id="product_id" value="'.$row->id.'"/>'.
                                '<input type="text" name="title_product" id="title_product" value="'.$row->title.'"/>'.
                                '<input type="number" name="idClient" id="idClient'.$inx.'" value="'.$idClient.'" required/>'.
                            '</div>'.
                            '<a class="btn btn-primary col-white btn-sm waves-effect" name="add_to_cart_name" onclick="openForm('.$row->id.')" id="add_to_cart">AJOUTER</a>'.
                        '</form>'.
                    '</td>'.
                '</tr>';
            $inx++;
        }
        return $output1;

    }
    }

    }

    public function _id_add_popup(Request $request){

        if($request->ajax()){

        $output2="";
        $popup_product = DB::select('select * from stock_agence_A where id = '.$request->id.'', [1]);

        if ($popup_product) {

            foreach ($popup_product as  $item) {

               $output2 .='<form action="/shopping_cart" method="post">'.
                    '<div class="col-lg-6 col-md-6 col-sm-12">'.
                    '<h4>'.$item->title.'</h4>'.
                    '<img src="../uploads/stock_agence_A/'.$item->image.'" class="" width="230px" alt="User">'.
                '</div>'.
                '<ul style="list-style: none;" onmouseover="tot()">'.
                    '<li class="dropdown">Prix de vente'.'<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-alert"></i><div class="notify"><span class="heartbit"></span><span class="point"></span></div></a></li>'.
                    '<input class="form-control" type="number" name="price_min_product" id="price_min_product" value="'.$item->price_min.'" onkeyup="if(parseInt(this.value)>'.$item->price_max.'){ this.value ='.$item->price_min.'; return false; }"/>'.
                    '<li>Prix maximun</li>'.
                    '<input type="text" class="input_none form-control alert alert-danger" style="color: #fff;" readonly name="price_max_product" id="price_max_product" value="'.$item->price_max.'"/>'.
                    '<li class="dropdown">Quantite commmande'.'<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-alert"></i><div class="notify"><span class="heartbit"></span><span class="point"></span></div></a></li>'.
                    '<input class="form-control" type="number" name="taxe_product" id="taxe_product" value="1" onclick="tot()"/>'.
                    '<br>'.'<b>PRIX TOTAL : <span id="total1"></span></b>'.
                '</ul>'.
                    '<input type="hidden" name="_token" id="" value="'.csrf_token().'"/>'.
                    '<div style="display:none">'.
                        '<input type="number" name="id_product" id="product_id" value="'.$item->id.'"/>'.
                        '<input type="text" name="title_product" id="title_product" value="'.$item->title.'"/>'.
                        '<input type="number" name="idClient" id="" value="0"/>'.
                    '</div>'.
                    '<div class="col-lg-3 col-md-3 col-sm-12">'.
                        '<input type="submit" class="btn btn-success btn-sm waves-effect" name="" onclick="" id="" value="AJOUTER"/>'.
                    '</div>'.
                '</form>';
                }
            return $output2;
        } else {
            return "ERRRRRRRRRRRRRRRRRRRRR";
        }

        }
    }

    public function add_cart(Request $request)
    {
        $add_cart = new facture();

        $add_cart->nameProduct = $request->input('title_product');
        $add_cart->idClient = $request->input('idClient');
        $add_cart->quantityProduct = $request->input('id_product');
        $add_cart->priceMinProduct = $request->input('price_min_product');
        $add_cart->priceMaxProduct = $request->input('price_max_product');
        $add_cart->taxeProduct = $request->input('taxe_product');

        $add_cart->save();

        return redirect()->back();
    }
    public function form_client_commande(Request $request){

    $add_client_agence_A = new client_agence_A();

    $add_client_agence_A->identifiantFacture = 0;

    $add_client_agence_A->name_client = $request->input('name_client');
    $add_client_agence_A->adress_client = $request->input('adress_client');
    $add_client_agence_A->telephone_client = $request->input('telephone_client');
    $add_client_agence_A->entreprise_client = $request->input('entreprise_client');
    $add_client_agence_A->account_client = $request->input('account_client');
    $add_client_agence_A->sexe_client = $request->input('sexe_client');

    $client_agence_A = $add_client_agence_A;

    $add_client_agence_A->save();

    if ($add_client_agence_A) {
        $update_client_id = DB::update('update facture set idClient = '.$add_client_agence_A->id_client.' where idClient = 0');
        if ($update_client_id) {
            return redirect('/commande/'.$add_client_agence_A->id_client.'')->with('client_agence_A',$client_agence_A);
        } else {
            return redirect('/live_commande')->with('error');
        }

    } else {
        return redirect('/live_commande')->with('error');
    }

    }
}
