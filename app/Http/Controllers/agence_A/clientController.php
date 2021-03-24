<?php

namespace App\Http\Controllers\agence_A;

use App\add_product;
use App\cash_int_a;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\client_agence_A;
use DB;
use Carbon\Carbon;
use App\client;

class clientController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      $stateCOMMANDE = DB::update('update state set stateCOMMANDE = 0 where idstate = 2');
        return view('agence_A.add_client');

    }
    public function list_client(){


      $client_agence_A = DB::table('client_agence_A')
                        ->orderBy('id_client', 'DESC')
                        ->paginate(5);
      return view('agence_A.list_client')->with('client_agence_A',$client_agence_A);

    }
    public function clientedit(Request $request, $id_client){

      $client_agence_A = client_agence_A::findOrfail($id_client);
      return view('agence_A.client-edit')->with('client_agence_A',$client_agence_A);
  }

  public function clientshow(Request $request, $id_client){

      $client_agence_A = client_agence_A::findOrfail($id_client);
      return view('agence_A.show_client')->with('client_agence_A',$client_agence_A);
  }

  public function clientupdate(Request $request, $id_client){

    $client_agence_A = client_agence_A::find($id_client);

    $client_agence_A->name_client = $request->input('name_client');
    $client_agence_A->adress_client = $request->input('adress_client');
    $client_agence_A->telephone_client = $request->input('telephone_client');
    $client_agence_A->entreprise_client = $request->input('entreprise_client');
    $client_agence_A->account_client = $request->input('account_client');
    $client_agence_A->sexe_client = $request->input('sexe_client');

    $client_agence_A->update();

    return redirect('/list_client')->with('client_agence_A', 'client_agence_A client_agence_A Modifier');
  }

    public function clientdelete($id_client)
    {
        # code...
        $client_agence_A = client_agence_A::findOrfail($id_client);
        $client_agence_A->delete();

        return redirect('/list_client')->with('client_agence_A'. 'client_agence_A Supprimer');
    }


    public function client_add(){

      return view('agence_A.client_add');

  }

    public function form_client_add(Request $request){

      if ($request) {
        $client_agence_A = new client_agence_A();

        $client_agence_A->identifiantFacture = 0;

        $client_agence_A->name_client = $request->input('name_client');
        $client_agence_A->adress_client = $request->input('adress_client');
        $client_agence_A->telephone_client = $request->input('telephone_client');
        $client_agence_A->entreprise_client = $request->input('entreprise_client');
        $client_agence_A->account_client = $request->input('account_client');
        $client_agence_A->sexe_client = $request->input('sexe_client');

        $client_agence_A->save();

        if ($client_agence_A) {

          $client = new client();
          $client->name = $request->input('name_client');
          $client->phone = $request->input('telephone_client');
          $client->usertype = 'client';
          $client->email = 'standard@standard.com';
          $client->email_verified_at = '';
          $client->password = $request->input('telephone_client');
          $client->telephone_client = $request->input('telephone_client');
          $client->entreprise_client = $request->input('entreprise_client');
          $client->account_client = $request->input('account_client');
          $client->sexe_client = $request->input('sexe_client');
        }

        return redirect('/add_client')->with('client_agence_A', $client_agence_A);

      } else {
        return redirect('/error_page')->with('erreur_client');
      }


  }


    public function search(Request $request)
    {

       if($request->ajax()){

         $output="";
         $i=0;

         $products = client_agence_A::where('name_client','LIKE','%'.$request->search."%")
                                    ->Orwhere('adress_client','LIKE','%'.$request->search."%")
                                    ->Orwhere('telephone_client','LIKE','%'.$request->search."%")
                                    ->Orwhere('entreprise_client','LIKE','%'.$request->search."%")
                                    ->get();

         if($products){

            foreach ($products as  $product) {

             $output.='<tr>'.

             '<td>'.'<span class="text-muted">'.$product->id_client.'</span>'.'</td>'.

             '<td>'.$product->name_client.'</td>'.

             '<td class="account" id="account_id'.$i.'">'.$product->account_client.'</td>'.

             '<td>'.$product->adress_client.'</td>'.

             '<td>'.$product->entreprise_client.'</td>'.

             '<td>'.$product->telephone_client.'</td>'.

             '<td>'.
                '<a href="/commande/'.$product->id_client.'" class="btn btn-success waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-shopping-cart">'.'</i>'.'</a>'.
             '</td>'.
             '<td>'.
                '<a href="/account/'.$product->id_client.'" class="btn btn-primary waves-effect waves-float waves-yellow">'.'<i class="zmdi zmdi-money-box">'.'</i>'.'</a>'.
             '</td>'.

             '</tr>';

              $i++;
            }
            return $output;

         }

       }

    }

    public function depot_compte()
    {
      return view('agence_A.depot_compte');
    }

    public function search_compte(Request $request)
    {

       if($request->ajax()){

         $output="";
         $i=0;

         $products = client_agence_A::where('name_client','LIKE','%'.$request->search."%")
                                    ->Orwhere('adress_client','LIKE','%'.$request->search."%")
                                    ->Orwhere('telephone_client','LIKE','%'.$request->search."%")
                                    ->Orwhere('entreprise_client','LIKE','%'.$request->search."%")
                                    ->get();

         if($products){

            foreach ($products as  $product) {

             $output.='<tr>'.

             '<td>'.'<span class="text-muted">'.$product->id_client.'</span>'.'</td>'.

             '<td>'.$product->name_client.'</td>'.

             '<td class="account" id="account_id'.$i.'">'.$product->account_client.'</td>'.

             '<td>'.$product->adress_client.'</td>'.

             '<td>'.$product->entreprise_client.'</td>'.

             '<td>'.$product->telephone_client.'</td>'.

             '<td>'.
                '<a href="/depot_account/'.$product->id_client.'" class="btn btn-primary waves-effect waves-float waves-yellow">'.'<i class="zmdi zmdi-money-box">'.'</i>'.'</a>'.
             '</td>'.

             '</tr>';

              $i++;
            }
            return $output;

         }

       }

    }

    public function depot_account(Request $request, $id_client)
    {
      $depot_account = client_agence_A::findOrfail($id_client);
      return view('agence_A.depot_account')->with('depot_account',$depot_account);
    }

    public function form_add_account(Request $request, $id_client)
    {
      $id_clientDB = client_agence_A::find($id_client);
      $id_client = $id_clientDB->id_client;
      if ($id_clientDB) {
          $id_clientDB->account_client += $request->input('sommeDepot');
          $id_clientDB->save();

          $name_client = array();
          array_push($name_client, $id_clientDB->name_client);
          $name_client = json_encode($name_client);

          if ($id_clientDB) {
            $cash_int_a = new cash_int_a();
            $cash_int_a->id_mere = $id_client;
            $cash_int_a->id_client = $id_client;
            $cash_int_a->name_client = $name_client;
            $cash_int_a->id_facture = $id_clientDB->identifiantFacture;
            $cash_int_a->referent = $id_clientDB->identifiantFacture;
            $cash_int_a->title = 'DEPOT EFFECTUE';
            $cash_int_a->type = 'DEPOT';
            $cash_int_a->quantity = 1;
            $cash_int_a->price_int = $request->input('sommeDepot');
            $cash_int_a->total_int = $request->input('sommeDepot');
            $cash_int_a->jour_int = DATE('d');
            $cash_int_a->mois_int = DATE('M');
            $cash_int_a->date_int = date('Y-m-d H:i:s');
            $cash_int_a->facture = json_encode($id_clientDB);
            $cash_int_a->save();
          }
          return redirect('/depot_compte')->with('depot_compte', 'DEPOT EFFECTUE DANS LE Compte Modifie');
      } else {
          return redirect('/add_client')->with('id_account_client_update', 'Compte PROBLEME');
      }
    }

}
