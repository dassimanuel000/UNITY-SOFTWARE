<?php

namespace App\Http\Controllers\Chef_agence_BController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\stock_agence_B;
use App\stock_int_b;
use App\stock_vente_B;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Mail;

class Chef_agence_BController extends Controller
{
    public function index(){

        return view('Chef_agence_B.index');

    }

    public function reception_produit()
    {
        return view('Chef_agence_B.reception_produit');
    }

    public function form_error_livraison(Request $request, $id)
    {
      $stock = stock_agence_B::find($id);
      if ($stock) {
          $stock->correct = 1;
          $stock->save();
          return redirect('/agence_b/reception_produit')->with('stock_error', "LE PRODUIT A ETE RETOURNE A L'AGENCE MERE");
      } else {
        return redirect('/error_page')->with('error', "Nous avons rencontre un probleme lors de l'execution");
      }
    }

    public function form_update_stock(Request $request)
    {
        $stock = stock_vente_B::find($request->input('id_mere'));
        if ($stock) {
            $stock->quantity += $request->input('quantity_update');
            $stock->save();
            if ($stock) {
                $stock_int = new stock_int_b();
                $stock_int->id_mere = $request->input('id_mere');
                $stock_int->id_emp = $request->input('update_id_emp');
                $stock_int->name_emp = $request->input('update_name_emp');
                $stock_int->referent = $request->input('update_referent');
                $stock_int->title = $request->input('update_title');
                $stock_int->quantity = $request->input('update_quantity');
                $stock_int->price_min = $request->input('update_price_min');
                $stock_int->price_max = $request->input('update_price_max');
                $stock_int->image = $request->input('update_image');
                $stock_int->price_achat = $request->input('update_price_achat');
                $stock_int->total_int = ($request->input('update_price_achat')*($request->input('quantity')));
                $stock_int->jour_int = DATE('d');
                $stock_int->mois_int = DATE('M');
                $stock_int->date_int = date('Y-m-d H:i:s');
                $stock_int->save();
            }
            $drop = stock_agence_B::findOrfail($request->input('update_id'));
            $drop->delete();
            if ($drop) {
                return redirect('/agence_b/reception_produit')->with('stock_update', "LA QUANTITE DU PRODUIT A ETE AUGMENTEE A L'AGENCE MERE");
            } else {
                return redirect('/error_page')->with('error', "Nous avons rencontre un probleme lors de l'execution");
            }
        } else {
            $mere_produit = stock_agence_B::find($request->input('id_mere'));
            
            $add_stock = new stock_vente_B();
            $add_stock->id_mere = $mere_produit->id_mere;
            $add_stock->referent = $mere_produit->referent;
            $add_stock->title = $mere_produit->title;
            $add_stock->description = $mere_produit->description;
            $add_stock->category = $mere_produit->category;
            $add_stock->quantity = $mere_produit->quantity;
            $add_stock->price_min = $mere_produit->price_min;
            $add_stock->price_max = $mere_produit->price_max;
            $add_stock->alarm_stock = $mere_produit->alarm_stock;
            $add_stock->image = $mere_produit->image;
            $add_stock->product_type = $mere_produit->product_type;
            $add_stock->provider = $mere_produit->provider;
            $add_stock->tax = $mere_produit->tax;
            $add_stock->price_achat = $mere_produit->price_achat;
            $add_stock->update = $mere_produit->update;
            $add_stock->correct = false;
            $add_stock->save();
            if ($add_stock) {
                $stock_int = new stock_int_b();
                $stock_int->id_mere = $request->input('id_mere');
                $stock_int->id_emp = $request->input('update_id_emp');
                $stock_int->name_emp = $request->input('update_name_emp');
                $stock_int->referent = $request->input('update_referent');
                $stock_int->title = $request->input('update_title');
                $stock_int->quantity = $request->input('update_quantity');
                $stock_int->price_min = $request->input('update_price_min');
                $stock_int->price_max = $request->input('update_price_max');
                $stock_int->image = $request->input('update_image');
                $stock_int->price_achat = $request->input('update_price_achat');
                $stock_int->total_int = ($request->input('update_price_achat')*($request->input('quantity')));
                $stock_int->jour_int = DATE('d');
                $stock_int->mois_int = DATE('M');
                $stock_int->date_int = date('Y-m-d H:i:s');
                $stock_int->save();
                return redirect('/agence_b/reception_produit')->with('stock_update', "LE NOUVEAU PRODUIT ENVOYE PAR L'AGENCE MERE A ETE AJOUTER AVEC SUCCESS");
            }else{
                return redirect('/error_page')->with('error', "Nous avons rencontre un probleme lors de l'execution");
            }
        }
    }

    /*public function form_add_stock(Request $request, $id)
    {
        $stock = stock_agence_B::find($id);
        if ($stock) {
            $stock_in = stock_int_b::find($request->input('id_mere'));
            if ($stock_in) {
                $count = 0;
            }
            else {
                $stock_int = new stock_int_b();
                $stock_int->id_mere = $request->input('add_id_mere');
                $stock_int->id_emp = $request->input('add_id_emp');
                $stock_int->name_emp = $request->input('add_name_emp');
                $stock_int->referent = $request->input('add_referent');
                $stock_int->title = $request->input('add_title');
                $stock_int->quantity = $request->input('add_quantity');
                $stock_int->price_min = $request->input('add_prix_min');
                $stock_int->price_max = $request->input('add_prix_max');
                $stock_int->image = $request->input('add_img');
                $stock_int->price_achat = $request->input('add_price_achat');
                $stock_int->total_int = ($request->input('add_price_achat')*($request->input('quantity')));
                $stock_int->jour_int = DATE('d');
                $stock_int->mois_int = DATE('M');
                $stock_int->date_int = date('Y-m-d H:i:s');
                $stock_int->save();
            }
            $add_stock = new stock_vente_B();
            $add_stock->id_mere = $stock->id_mere;
            $add_stock->referent = $stock->referent;
            $add_stock->title = $stock->title;
            $add_stock->description = $stock->description;
            $add_stock->category = $stock->category;
            $add_stock->quantity = $stock->quantity;
            $add_stock->price_min = $stock->price_min;
            $add_stock->price_max = $stock->price_max;
            $add_stock->alarm_stock = $stock->alarm_stock;
            $add_stock->image = $stock->image;
            $add_stock->product_type = $stock->product_type;
            $add_stock->provider = $stock->provider;
            $add_stock->tax = $stock->tax;
            $add_stock->price_achat = $stock->price_achat;
            $add_stock->update = $stock->update;
            $add_stock->correct = false;
            $add_stock->save();

            if ($add_stock) {    
                $drop = stock_agence_B::findOrfail($id);
                $drop->delete();
                if ($drop) {
                    return redirect('/agence_b/reception_produit')->with('stock_add', "LE PRODUIT A ETE ENREGISTRE ");
                } else {
                    return redirect('/error_page')->with('error', "Nous avons rencontre un probleme lors de l'execution");
                }
            }
            
        } else {
          return redirect('/error_page')->with('error', "Nous avons rencontre un probleme lors de l'execution");
        }
    }*/

    public function productshow(Request $request, $id){

        $add_product = stock_vente_B::findOrfail($id);
        return view('Chef_agence_B.show_product')->with('add_product',$add_product);
    }

    public function list_product(){

        $add_product = DB::table('stock_vente_B')
                            ->orderBy('category', 'ASC')
                            ->paginate(5);

        /*$var = Mail::send('Html.view', $add_product, function ($message) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->sender('john@johndoe.com', 'John Doe');
            $message->to('john@johndoe.com', 'John Doe');
            $message->cc('john@johndoe.com', 'John Doe');
            $message->bcc('john@johndoe.com', 'John Doe');
            $message->replyTo('john@johndoe.com', 'John Doe');
            $message->subject('Subject');
            $message->priority(3);
            $message->attach('images/profile_av.jpg');
        });*/
        if ($add_product) {
            return view('Chef_agence_B.list_product')->with('add_product',$add_product);
        } else {
            return redirect('/error_page')->with('add_product',$add_product);
        }
        
        //$dv = stock_int_a;
    }

    public function productdelete($id)
    {
        # code...
        $add_product = stock_vente_B::findOrfail($id);
        $add_product->delete();
        
        return redirect('/agence_b/list_product')->with('add_product'. 'produit Supprimer');
    }

    public function search_products(){

        return view('Chef_agence_B.search_product');

    }

    public function search_stock(Request $request)
    {
      
       if($request->ajax()){
    
         $output="";
         $products = stock_vente_B::where('referent','LIKE','%'.$request->search."%")
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
                '<a href="/agence_b/show_product/'.$row->id.'">'.'<img src="../uploads/stock_agence_A/'.$row->image.'" alt="image produit" class="img-responsive responsive" height="45px" srcset="">'.'</a>'.
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
             '<form action="/agence_b/product-delete/'.$row->id.'" method="POST">'.
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
}
