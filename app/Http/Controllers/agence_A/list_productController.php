<?php

namespace App\Http\Controllers\agence_A;

use App\add_product;
use App\stock_int_a;
use App\stock_update;
use App\stock_dispatch;
use App\stock_agence_B;
use App\stock_int_b;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class list_productController extends Controller
{
    //
    public function index(){

        $add_product = DB::table('stock_agence_A')
                            ->orderBy('category', 'ASC')
                            ->paginate(5);
        return view('agence_A.list_product')->with('add_product',$add_product);

    }

    public function productedit(Request $request, $id){

        $add_product = add_product::findOrfail($id);
        return view('agence_A.product-edit')->with('add_product',$add_product);
    }

    public function productshow(Request $request, $id){

        $add_product = add_product::findOrfail($id);
        return view('agence_A.show_product')->with('add_product',$add_product);
    }

    public function productupdate(Request $request, $id){

        $add_product = add_product::find($id);

        if ($add_product) {

            $add_product->referent = $request->input('referent');
            $add_product->title = $request->input('title');
            $add_product->description = $request->input('description');
            $add_product->category = $request->input('category');
            $add_product->quantity = $request->input('quantity');
            $add_product->price_min = $request->input('price_min');
            $add_product->price_max = $request->input('price_max');
            $add_product->alarm_stock = $request->input('alarm_stock');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();// extension
                $filename = time().'.'.$extension;
                $file->move('uploads/stock_agence_A/', $filename);
                $add_product->image = $filename;
            }else {
                return $request;
                $add_product->image = $filename;
            }

            $img = $add_product->image;
            $array = array();

            $prix_min_last = $request->input('prix_min_last');
            $prix_max_last = $request->input('prix_max_last');
            $prix_achat_last = $request->input('prix_achat_last');
            $last_update = $request->input('last_update');
            $quantity_last = $request->input('quantity_last');

            $update = json_decode(($request->input('update')), true);
            array_push($array, $update, $prix_achat_last,$prix_max_last, $prix_min_last);

            $add_product->product_type = $request->input('product_type');
            $add_product->provider = $request->input('provider');
            $add_product->tax = $request->input('tax');
            $add_product->price_achat = $request->input('price_achat');
            $add_product->update = json_encode($array);

            $add_product->update();

            if ($add_product) {
                $total = 0;
                $total = ($prix_min_last + $prix_max_last + $prix_achat_last) - ($request->input('price_min') + $request->input('price_max') + $request->input('price_achat'));
                if ( $total != 0 ) {
                    $stock_update = new stock_update();
                    $stock_update->id_mere = $id;
                    $stock_update->referent = $request->input('referent');
                    $stock_update->title = $request->input('title');
                    $stock_update->quantity_before = $request->input('quantity_before');
                    $stock_update->quantity_after = $request->input('quantity');
                    $stock_update->price_min_before = $prix_min_last;
                    $stock_update->price_max_before = $prix_max_last;
                    $stock_update->price_min_after = $request->input('price_min');
                    $stock_update->price_max_after = $request->input('price_max');
                    $stock_update->image = $img;
                    $stock_update->price_achat_before = $prix_achat_last;
                    $stock_update->price_achat_after = $request->input('price_achat');
                    $stock_update->last_update = $last_update;
                    $stock_update->update = json_encode($array);
                    $stock_update->save();

                }

                if ($quantity_last != $request->input('quantity')) {
                    $stock_int = new stock_int_a();
                    $stock_int->id_mere = $id;
                    $stock_int->id_emp = $request->input('id_emp');
                    $stock_int->name_emp = $request->input('name_emp');
                    $stock_int->referent = $request->input('referent');
                    $stock_int->title = $request->input('title');
                    $stock_int->quantity = $request->input('quantity');
                    $stock_int->price_min = $request->input('price_min');
                    $stock_int->price_max = $request->input('price_max');
                    $stock_int->image = $img;
                    $stock_int->price_achat = $request->input('price_achat');
                    $stock_int->total_int = ($request->input('price_achat')*($request->input('quantity')));
                    $stock_int->jour_int = DATE('d');
                    $stock_int->mois_int = DATE('M');
                    $stock_int->date_int = date('Y-m-d H:i:s');
                    $stock_int->save();
                }

            }

            return redirect('/list_product')->with('add_product', 'add_product produit Modifier');

        } else {
            return view('/agence_A')->with('status_err', $request);
        }
    }

    public function productdelete($id)
    {
        # code...
        $add_product = add_product::findOrfail($id);
        $add_product->delete();

        return redirect('/list_product')->with('add_product'. 'produit Supprimer');
    }


    public function search_products(){

        return view('agence_A.search_product');

    }

    public function search_product(Request $request)
    {

       if($request->ajax()){

         $output="";
         $products = add_product::where('referent','LIKE','%'.$request->search."%")
                                    ->Orwhere('title','LIKE','%'.$request->search."%")
                                    ->Orwhere('description','LIKE','%'.$request->search."%")
                                    ->Orwhere('product_type','LIKE','%'.$request->search."%")
                                    ->Orwhere('category','LIKE','%'.$request->search."%")
                                    ->get();

         if($products){

            foreach ($products as  $row) {

             $output.='<tr>'.

             '<td>'.'<span class="col-green">'.$row->id.'</span>'.'</td>'.

             '<td>'.
                '<a href="/show_product/'.$row->id.'">'.'<img style="width:48" src="uploads/stock_agence_A/'.$row->image.'">'.
             '</td>'.

             '<td>'.$row->referent.'</td>'.

             '<td>'.'<span class="text-muted">'.$row->title.'</span>'.'</td>'.

             '<td>'.'<span class="text-color">'.$row->description.'</span>'.'</td>'.

             '<td>'.'<span class="text-color">'.$row->category.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$row->quantity.'</span>'.'</td>'.

             '<td class="price_min">'.'<span class="col-green">'.$row->price_min.'</span>'.'</td>'.

             '<td class="price_max">'.'<span class="col-red">'.$row->price_max.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$row->alarm_stock.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$row->product_type.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$row->provider.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$row->tax.'</span>'.'</td>'.

             '<td>'.
                '<a href="/product-edit/'.$row->id.'" class="btn btn-default waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-edit">'.'</i>'.'</a>'.
             '</td>'.

             '<td>'.
             '<form action="/product-delete/'.$row->id.'" method="POST">'.
                 csrf_field().
                 method_field("DELETE").
                 '<button type="submit" onclick="return confirm("Are you sure?")" class="btn btn-danger waves-effect waves-float waves-red">'.
                     '<i class="zmdi zmdi-delete">'.'</i>'.
                 '</button>'.
             '</form>'.
             '</td>'.

             '</tr>';

            }
            return $output;

         }

       }

    }

    public function distrib_product()
    {
        return view('agence_A.distrib_product');
    }

    public function distrib_product_agence(){
        return view('agence_A.distrib_product_agence');
    }

    public function search_dispatch(Request $request){

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
            $idClient = DB::select('select * from client_agence_A');
            $idClient = count($idClient);
            $idClient = $idClient + 1;

            foreach ($products as  $row) {

            $output.='<tr>'.
                        '<td><img src="../uploads/stock_agence_A/'.$row->image.'" width="48" alt="User"></td>'.
                        '<td><h5> '.$row->title.'</h5></td>'.
                        '<td><span class="text-muted">'.$row->price_min.' Fcfa</span></td>'.
                        '<td>'.$row->quantity.'</td>'.
                        '<td>'.
                            '<form action="/add_stock" method="post">'.
                                '<input type="hidden" name="_token" id="" value="'.csrf_token().'"/>'.
                                '<div style="display:none">'.
                                    '<input type="number" name="id_product" id="product_id" value="'.$row->id.'"/>'.
                                    '<input type="text" name="title_product" id="title_product" value="'.$row->title.'"/>'.
                                    '<input type="number" name="idClient" id="idClient'.$inx.'" value="'.$idClient.'" required/>'.
                                    '<input type="text" name="description" id="description" value="'.$row->description.'"/>'.
                                    '<input type="text" name="category" id="category" value="'.$row->category.'"/>'.
                                    '<input type="text" name="referent" id="referent" value="'.$row->referent.'"/>'.
                                    '<input type="text" name="alarm_stock" id="alarm_stock" value="'.$row->alarm_stock.'"/>'.
                                    '<input type="text" name="image" id="image" value="'.$row->image.'"/>'.
                                    '<input type="text" name="product_type" id="product_type" value="'.$row->product_type.'"/>'.
                                    '<input type="text" name="provider" id="provider" value="'.$row->provider.'"/>'.
                                    '<input type="text" name="tax" id="tax" value="'.$row->tax.'"/>'.
                                    '<input type="text" name="price_achat" id="price_achat" value="'.$row->price_achat.'"/>'.
                                '</div>'.
                                '<a class="btn btn-primary col-white btn-sm waves-effect" name="add_to_cart_name" onclick="openForm()" id="add_to_cart">AJOUTER</a>'.
                                '<div id="loginPopup" onmouseover="tot()">'.
                                    '<div class="form-popup" id="popupForm" style="background:#fff">'.
                                        '<section class="banner_area">'.
                                            '<div class="container">'.
                                                '<div class="col-lg-6 col-md-6 col-sm-12">'.
                                                    '<h4>'.$row->title.'</h4>'.
                                                    '<img src="../uploads/stock_agence_A/'.$row->image.'" class="" width="230px" alt="User">'.
                                                '</div>'.
                                                '<ul style="list-style: none;" onmouseover="tot()">'.
                                                    '<li class="dropdown">Prix de vente'.'<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-alert"></i><div class="notify"><span class="heartbit"></span><span class="point"></span></div></a></li>'.
                                                    '<input class="form-control" type="number" name="price_min_product" id="price_min_product" value="'.$row->price_min.'" onkeyup="if(parseInt(this.value)>'.$row->price_max.'){ this.value ='.$row->price_min.'; return false; }"/>'.
                                                    '<li>Prix maximun</li>'.
                                                    '<input type="text" class="input_none form-control alert alert-danger" style="color: #fff;" readonly name="price_max_product" id="price_max_product" value="'.$row->price_max.'"/>'.
                                                    '<li class="dropdown">Quantite a envoyer'.'<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-alert"></i><div class="notify"><span class="heartbit"></span><span class="point"></span></div></a></li>'.
                                                    '<input class="form-control" type="number" name="taxe_product" id="taxe_product" value="1" onclick="tot()"/>'.
                                                    '<br>'.'<b>QUANTITE TOTAL : <span id="quantiti1"></span></b>'.
                                                    '<br>'.'<b>PRIX TOTAL : <span id="total1"></span></b>'.
                                                '</ul>'.
                                                '<div class="col-lg-3 col-md-3 col-sm-12">'.
                                                    '<button type="submit" class="btn btn-success">AJOUTER AINSI</button>'.
                                                '</div>'.
                                            '</div>'.
                                        '</section>'.
                                    '</div>'.
                                '</div>'.
                            '</form>'.
                        '</td>'.
                    '</tr>';
                $inx++;
            }
            return $output;

        }
        }

    }

    public function add_stock(Request $request)
    {

        $idmere = DB::select('select * from stock_dispatch where id_mere = '.$request->input('id_product').' ');
        //$count = count($idmere);
        if ($idmere) {
            return redirect('/error_page')->with('erroe', 'L erreurs est survenu!!!');
        }else{
            $add_stock = new stock_dispatch();

            $add_stock->id_mere = $request->input('id_product');
            $add_stock->referent = $request->input('referent');
            $add_stock->title = $request->input('title_product');
            $add_stock->description = $request->input('description');
            $add_stock->category = $request->input('category');
            $add_stock->quantity = $request->input('taxe_product');
            $add_stock->price_min = $request->input('price_min_product');
            $add_stock->price_max = $request->input('price_max_product');
            $add_stock->alarm_stock = $request->input('alarm_stock');
            $add_stock->image = $request->input('image');
            $add_stock->product_type = $request->input('product_type');
            $add_stock->provider = $request->input('provider');
            $add_stock->tax = $request->input('tax');
            $add_stock->price_achat = $request->input('price_achat');

            $add_stock->save();
            return redirect()->back();
        }


    }

    public function delete_stock()
    {
        $delete_facture = DB::delete('DELETE FROM stock_dispatch;');
        //$delete_facture->delete();
        return redirect('agence_A/');
    }

    public function insert_stock(Request $request)
    {
        $insert_stock = DB::select('select * from stock_dispatch');
        $count1 = count($insert_stock);
        $count2 = 0;
        foreach ($insert_stock as $balue) {

            $add_stock = new stock_agence_B();
            $add_stock->id_mere = $balue->id_mere;
            $add_stock->referent = $balue->referent;
            $add_stock->title = $balue->title;
            $add_stock->description = $balue->description;
            $add_stock->category = $balue->category;
            $add_stock->quantity = $balue->quantity;

            $update_qty = add_product::find($balue->id_mere);
            $update_qty->quantity = $update_qty->quantity - $balue->quantity;
            $update_qty->save();

            $add_stock->price_min = $balue->price_min;
            $add_stock->price_max = $balue->price_max;
            $add_stock->alarm_stock = $balue->alarm_stock;
            $add_stock->image = $balue->image;
            $add_stock->product_type = $balue->product_type;
            $add_stock->provider = $balue->provider;
            $add_stock->tax = $balue->tax;
            $add_stock->price_achat = $balue->price_achat;
            $add_stock->update = '[]';
            $add_stock->correct = false;
            $add_stock->save();

            if ($add_stock) {
                # code...
            } else {
                # code...
            }


            $count2 = $count2+1;
        }

        if ($add_stock) {

            $stock_int_b = new stock_int_b();
            $stock_int_b->id_emp = $request->input('id_emp');
            $stock_int_b->name_emp = $request->input('name_emp');
            $stock_int_b->id_mere = $balue->id_mere;
            $stock_int_b->referent = $balue->referent;
            $stock_int_b->title = $balue->title;
            $stock_int_b->quantity = $balue->quantity;
            $stock_int_b->price_min = $balue->price_min;
            $stock_int_b->price_max = $balue->price_max;
            $stock_int_b->price_achat = $balue->alarm_stock;
            $stock_int_b->image = $balue->image;
            $stock_int_b->total_int = $balue->quantity;
            $stock_int_b->jour_int = DATE('d');
            $stock_int_b->mois_int = DATE('M');
            $stock_int_b->date_int = date('Y-m-d H:i:s');
            $stock_int_b->save();
        }


        if ($count1 = $count2) {
            $delete_facture = DB::delete('DELETE FROM stock_dispatch;');
            return redirect('/distrib_product')->with('insert_stock', 'OK');
        } else {
            return redirect('/distrib_product')->with('no_insert_stock', 'ERRUER');
        }

    }

    public function form_resend_stock(Request $request, $id)
    {
        $stock = stock_agence_B::find($id);
        if ($stock) {
            $stock->correct = 0;
            $stock->save();
            if ($stock) {
                return redirect('/distrib_product_agence_B')->with('resend_stock', 'LE STOCK A ETE RENVOYE AVEC SUCCESS');
            } else {
                return redirect('/error_page')->with('error', 'L erreurs est survenu!!!');
            }

        }
    }

    public function form_remove_stock(Request $request, $id)
    {
        $stock = stock_agence_B::find($id);
        if ($stock) {

            $update_qty = add_product::find($stock->id_mere);
            $update_qty->quantity = $update_qty->quantity + $stock->quantity;
            $update_qty->save();
            if ($update_qty) {

                $stock->delete();
                if ($stock) {
                    return redirect('/distrib_product_agence_B')->with('remove_stock', 'LE STOCK A ETE ENLEVE DES APPROVISIONNNEMENTS DES AGENCES');
                } else {
                    return redirect('/error_page')->with('erroe', 'L erreurs est survenu!!!');
                }
            } else {
                return redirect('/error_page')->with('erroe', 'L erreurs est survenu!!!');
            }

        }
    }

}
