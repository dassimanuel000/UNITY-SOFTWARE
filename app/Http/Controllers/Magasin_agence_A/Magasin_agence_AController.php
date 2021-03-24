<?php

namespace App\Http\Controllers\Magasin_agence_A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FactureCommande;
use App\facture_print;
use App\add_product;
use App\stock_out_a;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Magasin_agence_AController extends Controller
{
    public function index(){

        return view('Magasin_agence_A.Magasin_agence_A');

    }
    public function state(){

        return view('Magasin_agence_A.state');

    }
    public function facture_livraision()
    {
        return view('Magasin_agence_A.facture_livraision');
    }
    public function facture_livraision_edit()
    {
        return view('Magasin_agence_A.facture_livraision_edit');
    }

    public function modif_livrasion(Request $request, $idFactureCommande){

        $facture_livraison = FactureCommande::find($idFactureCommande);

        $stateCOMMANDE = DB::update('update state set stateAUTRE = 1 where idstate = 2');
        return view('Magasin_agence_A.modif_livrasion')->with('facture_livraison',$facture_livraison);

    }
    public function modif_livrasion_edit(Request $request, $idFactureCommande)
    {
        $facture_livraison = facture_print::find($idFactureCommande);

        $stateCOMMANDE = DB::update('update state set stateAUTRE = 1 where idstate = 2');
        return view('Magasin_agence_A.modif_livrasion_edit')->with('facture_livraison',$facture_livraison);
    }
    public function liste_facture()
    {
        return view('Magasin_agence_A.liste_facture');
    }
    public function list_facture(Request $request, $idFactureCommande)
    {
        $facture_livraison = facture_print::find($idFactureCommande);

        $stateCOMMANDE = DB::update('update state set stateAUTRE = 1 where idstate = 2');
        return view('Magasin_agence_A.list_facture')->with('facture_livraison',$facture_livraison);
    }
    public function search_livrason(Request $request)
    {

       if($request->ajax()){

         $output="";
         $i=0;

         $search_livrason = FactureCommande::where('nameClient','LIKE','%'.$request->search."%")
                                            ->Orwhere('identifiantFacture','LIKE','%'.$request->search."%")
                                            ->get();

         if($search_livrason){

            foreach ($search_livrason as  $product) {

            //$nameClient = $product->nameClient;
            $nameClient = json_decode(($product->nameClient), true);
            //$nameClient = json_decode(($facture_livraison->nameClient), true);

             $output.='<tr>'.

             '<td>'.'<span class="text-muted">'.$product->idFactureCommande.'</span>'.'</td>'.

             '<td>'.$product->identifiantFacture.'</td>'.

             '<td>'.$nameClient[0].'</td>'.

             '<td class="account" id="account_id'.$i.'">'.$product->totalFacture.'</td>'.

             '<td>'.Carbon::parse($product->created_at)->diffforHumans().'<br> Fait le :'.(date('d F Y', strtotime($product->created_at))).'<br> Modifie le :'.date('d F Y H:i:s', strtotime($product->updated_at)).'</td>'.

             '<td>'.
                '<a href="/modif_livrasion/'.$product->idFactureCommande.'" class="btn btn-success waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-shopping-cart">'.'</i>'.'</a>'.
             '</td>'.

             '</tr>';

              $i++;
            }
            return $output;

         }

       }

    }
    public function search_livrason_edit(Request $request)
    {
        if($request->ajax()){

            $output="";
            $i=0;

            /*$search_livrason = facture_print::where('nameClient','LIKE','%'.$request->search."%")
                                            ->Orwhere('identifiantFacture','LIKE','%'.$request->search."%")
                                            ->Orwhere('totalLivre'<'totalCommande')
                                            ->get();*/
            $search_livrason = DB::select('select * from facture_print where totalLivre < totalCommande ');
            if($search_livrason){

               foreach ($search_livrason as  $product) {

               //$nameClient = $product->nameClient;
               //$nameClient = json_decode(($product->nameClient), true);
               //$nameClient = json_decode(($facture_livraison->nameClient), true);

                $output.='<tr>'.

                '<td>'.'<span class="text-muted">'.$product->idfactureprint.'</span>'.'</td>'.

                '<td>'.$product->identifiantFacture.'</td>'.

                '<td>'.$product->nameClient.'</td>'.

                '<td class="account" id="account_id'.$i.'">'.$product->totalFacture.'</td>'.

                '<td>'.Carbon::parse($product->created_at)->diffforHumans().'<br> Fait le :'.(date('d F Y', strtotime($product->created_at))).'<br> Modifie le :'.date('d F Y H:i:s', strtotime($product->updated_at)).'</td>'.

                '<td>'.
                   '<a href="/modif_livrasion_edit/'.$product->idfactureprint.'" class="btn btn-success waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-shopping-cart">'.'</i>'.'</a>'.
                '</td>'.

                '<td>'.$product->allQuantityRetire.'</td>'.

                '</tr>';

                 $i++;
               }
               return $output;

            }else {
                $output = '<button class="btn-hover btn btn-danger button-dashboard">TOUTES LES FACTURES SONT DEJA COMPLETES</button>';
                return $output;
            }

          }
    }
    public function search_list_facture(Request $request)
    {
        if($request->ajax()){

            $output="";
            $i=0;

            /*$search_livrason = facture_print::where('nameClient','LIKE','%'.$request->search."%")
                                            //->Orwhere('identifiantFacture','LIKE','%'.$request->search."%")
                                            ->where('totalLivre','LIKE','totalCommande')
                                            ->get();*/
            $search_livrason = DB::select('select * from facture_print where totalLivre LIKE totalCommande AND nameClient LIKE "%'.$request->search.'%" ORDER BY created_at DESC ');
            if($search_livrason){

               foreach ($search_livrason as  $product) {

               //$nameClient = $product->nameClient;
               //$nameClient = json_decode(($product->nameClient), true);
               //$nameClient = json_decode(($facture_livraison->nameClient), true);

                $output.='<tr>'.

                '<td>'.'<span class="text-muted">'.$product->idfactureprint.'</span>'.'</td>'.

                '<td>'.$product->identifiantFacture.'</td>'.

                '<td>'.$product->nameClient.'</td>'.

                '<td class="account" id="account_id'.$i.'">'.$product->totalFacture.'</td>'.

                '<td>'.Carbon::parse($product->created_at)->diffforHumans().'<br> Fait le :'.(date('d F Y', strtotime($product->created_at))).'<br> Modifie le :'.date('d F Y H:i:s', strtotime($product->updated_at)).'</td>'.

                '<td>'.
                   '<a href="/list_facture/'.$product->idfactureprint.'" class="btn btn-success waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-shopping-cart">'.'</i>'.'</a>'.
                '</td>'.

                '<td>'.$product->allQuantityRetire.'</td>'.

                '</tr>';

                 $i++;
               }
               return $output;

            }else {
                $output = '<button class="btn-hover btn btn-danger button-dashboard">TOUTES LES FACTURES SONT DEJA COMPLETES</button>';
                return $output;
            }

          }
    }
    public function facture_livraision_definitif(Request $request, $idFactureCommande)
    {
        $facture_livraison = FactureCommande::find($idFactureCommande);
        $nameC = json_decode(($facture_livraison->nameClient), true);
        $nameC = $nameC[0];
        $idC = json_decode(($facture_livraison->idClient), true);
        //$idC = $idC[0];

        $allP = json_encode(($facture_livraison->allProduct), true);
        $allProduct = json_decode(($facture_livraison->allProduct), true);

        $allQtyCom = json_encode(($facture_livraison->allQuantityCommande), true);

        $allPUnit = json_encode(($facture_livraison->allPriceUnitaire), true);

        $allPTotal = json_encode(($facture_livraison->allPriceTotal), true);

        $update = $facture_livraison->update + 0;

        $identifiantFacture = $facture_livraison->identifiantFacture;

        $identifiantFacture = $identifiantFacture.'/'.$update;

        $remise = $facture_livraison->remise;
        $totalCmd = ($facture_livraison->totalCommande);
        $totalFact = ($facture_livraison->totalFacture);

        $array = array();
        $count = $request->input('count');

        $array_retrait = array();

        for ($increment=0; $increment < $count; $increment++) {


            $out_stock = DB::select('select * from stock_agence_A where title = "'.$allProduct[$increment].'" ');
            foreach ($out_stock as $value) {
                $stock_out_a = new stock_out_a();
                $stock_out_a->id_mere = $value->id;
                $stock_out_a->id_emp = (Auth::user()->id);
                $stock_out_a->name_emp = Auth::user()->name;
                $stock_out_a->id_client = $idC;
                $stock_out_a->name_client = $nameC;
                $stock_out_a->id_facture = $identifiantFacture;
                $stock_out_a->referent = $value->referent;
                $stock_out_a->title = $value->title;
                $stock_out_a->quantity = ($request->input('retire'.$increment));
                $stock_out_a->price_min = $value->price_min;
                $stock_out_a->price_max = $value->price_max;
                $stock_out_a->image = $value->image;
                $stock_out_a->price_achat = $value->price_achat;
                $stock_out_a->total_out = ($value->price_min*($request->input('retire'.$increment)));
                $stock_out_a->jour_out = DATE('d');
                $stock_out_a->mois_out = DATE('M');
                //$stock_out_a->date_out = DATE('Y').'-'.DATE('M').'-'.DATE('d');//DATE('d M Y');//2020-06-28
                $stock_out_a->date_out = date('Y-m-d H:i:s');
                $stock_out_a->save();

            }



            //
            $quantitestock = DB::select('select quantity from stock_agence_A where title = "'.$allProduct[$increment].'" ');
            foreach ($quantitestock as $key) {
                $enstock = $key->quantity;
            }
            $new_stock = ($enstock - ($request->input('retire'.$increment)));
            $update_stock = DB::update('update stock_agence_A set quantity = '.($new_stock).' where title = "'.$allProduct[$increment].'" ');
            //$update_stock = add_product::where('nameClient','LIKE','%'.$request->search."%")->get();

            array_push($array_retrait, $new_stock);
            array_push($array, $request->input('retire'.$increment));
        }
        $allQtyRtir = json_encode($array);

        $array_retrait = json_encode($array_retrait);

        $totalliv = array_sum($array);



        $facture_print = new facture_print();
        $facture_print->nameClient = ($nameC);
        $facture_print->identifiantFacture = ($identifiantFacture);
        $facture_print->idClient = ($idC);
        $facture_print->allProduct = ($allP);
        $facture_print->allQuantityCommande = ($allQtyCom);
        $facture_print->allQuantityRetire = $allQtyRtir;
        $facture_print->allPriceUnitaire = ($allPUnit);
        $facture_print->allPriceTotal = ($allPTotal);
        $facture_print->remise = ($remise);
        $facture_print->totalCommande = ($totalCmd);
        $facture_print->totalLivre = $totalliv;
        $facture_print->totalFacture = ($totalFact);
        $facture_print->update = ($update);
        $facture_print->save();

        if ($facture_print) {


            $stateCOMMAND = DB::update('update state set stateAUTRE = 1 where idstate = 2');
            $stateCOM = DB::update('update state set stateAUTRE = 1 where idstate = 1');
            $livre = DB::update('update FactureCommande set allQuantityRetire = '.json_encode($allQtyRtir).' where idFactureCommande = '.$idFactureCommande.'');
            //$delete = DB::delete('delete FactureCommande where idFactureCommande = '.$idFactureCommande.' ');
            $delete = FactureCommande::findOrfail($idFactureCommande);
            $delete->delete();

            //return $nameC.'='.$totalFact.'='.$array_retrait.'+'.$totalCmd.'='.$remise.'='.$allPTotal.'='.$allPUnit.'='.$allQtyCom.'='.$allP.'='.$totalliv.'='.$allQtyRtir.'='.$idC;
            return redirect('/Magasin_agence_A')->with('Magasin_agence_A', 'Magasin agence A SAUVEGARDE OK');
        }else {
            return redirect('/Magasin_agence_A')->with('error', 'UNE ERREUR A EMPECHE L EXECUTION ');
        }
    }
    public function facture_livraision_definitif_edit(Request $request, $idfactureprint)
    {
        $facture_livraison = facture_print::find($idfactureprint);

        $allProduct = json_decode(($facture_livraison->allProduct), true);
        $allProduct = json_decode($allProduct);
        $array = array();
        $count = $request->input('count');

        for ($i=0; $i < $count; $i++) {

            $out_stock = DB::select('select * from stock_agence_A where title = "'.$allProduct[$i].'" ');
            foreach ($out_stock as $value) {
                $stock_out_a = new stock_out_a();
                $stock_out_a->id_mere = $value->id;
                $stock_out_a->id_emp = (Auth::user()->id);
                $stock_out_a->name_emp = Auth::user()->name;
                $stock_out_a->id_client = $facture_livraison->idClient;
                $stock_out_a->name_client = $facture_livraison->nameClient;
                $stock_out_a->id_facture = $facture_livraison->identifiantFacture;
                $stock_out_a->referent = $value->referent;
                $stock_out_a->title = $value->title;
                $stock_out_a->quantity = $request->input('qiantite_retire'.$i);
                $stock_out_a->price_min = $value->price_min;
                $stock_out_a->price_max = $value->price_max;
                $stock_out_a->image = $value->image;
                $stock_out_a->price_achat = $value->price_achat;
                $stock_out_a->total_out = ($value->price_min*($request->input('qiantite_retire'.$i)));
                $stock_out_a->jour_out = DATE('d');
                $stock_out_a->mois_out = DATE('M');
                //$stock_out_a->date_out = DATE('Y').'-'.DATE('M').'-'.DATE('d');//DATE('d M Y');//2020-06-28
                $stock_out_a->date_out = date('Y-m-d H:i:s');
                $stock_out_a->save();

            }

            $quantitestock = DB::select('select quantity from stock_agence_A where title = "'.$allProduct[$i].'" ');
            foreach ($quantitestock as $key) {
                $enstock = $key->quantity;
            }
            $new_stock = ($enstock - ($request->input('qiantite_retire'.$i)));
            $update_stock = DB::update('update stock_agence_A set quantity = '.($new_stock).' where title = "'.$allProduct[$i].'" ');
            $retire = ($request->input('retire'.$i)+$request->input('deja_retire'.$i));
            array_push($array, $retire);
        }
        $allQtyRtir = json_encode($array);

        $totalliv = array_sum($array);

        if ($facture_livraison) {

            $update = $facture_livraison->update;

            $identifiantFacture = $facture_livraison->identifiantFacture;
            $identifiantFacture = $identifiantFacture.($update+1);
            $facture_livraison->identifiantFacture = $identifiantFacture;

            $facture_livraison->allQuantityRetire = $allQtyRtir;
            $facture_livraison->totalLivre = $totalliv;

            $facture_livraison->update = $update+1;
            $facture_livraison->save();
        }

        $stateCOMMAND = DB::update('update state set stateAUTRE = 1 where idstate = 2');
        $stateCOM = DB::update('update state set stateAUTRE = 1 where idstate = 1');
        //return $nameC.'='.$totalFact.'='.$totalCmd.'='.$remise.'='.$allPTotal.'='.$allPUnit.'='.$allQtyCom.'='.$allP.'='.$totalliv.'='.$allQtyRtir.'='.$idC;
        return redirect('/Magasin_agence_A')->with('Magasin_agence_A', 'Magasin agence A SAUVEGARDE OK');
    }
}
