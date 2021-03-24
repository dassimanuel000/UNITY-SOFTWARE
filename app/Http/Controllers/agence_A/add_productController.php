<?php

namespace App\Http\Controllers\agence_A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\add_product;
use App\list_product;
use Carbon\Carbon;
use App\stock_int_a;
use Illuminate\Support\Facades\DB;

class add_productController extends Controller
{
    //
    public function index(){
        return view('agence_A.add_product');
    }

    public function form_add_product(Request $request){

        $Add_product = new add_product();

        if ($Add_product) {

            $arr_1= explode(' ',trim($request->input('product_family')));
            $product_family = "";
            foreach ($arr_1 as $key_1) {
                $product_family .= $key_1[0];
            }

            $arr_2= explode(' ',trim($request->input('product_type')));
            $product_type = "";
            foreach ($arr_2 as $key_1) {
                $product_type .= $key_1[0];
            }

            $arr_3= explode(' ',trim($request->input('category')));
            $category = "";
            foreach ($arr_3 as $key_1) {
                $category .= $key_1[0];
            }
            /*
            $arr_1= explode(' ',trim($request->input('product_family')));
            if (count($arr_1)> 1) {
                $output_1 = $arr_1[0];
                $output_2 = $arr_1[1];
                $product_family = strtoupper($output_1[0]).strtoupper($output_2[0]);
            }else {
                $product_family = strtoupper($request->input('product_family')[0]).strtoupper($request->input('product_family')[1]);
            }

            $arr_2= explode(' ',trim($request->input('product_type')));
            if (count($arr_2)> 1) {
                $output_3 = $arr_2[0];
                $output_4 = $arr_2[1];
                $product_type = strtoupper($output_3[0]).strtoupper($output_4[0]);
            }else {
                $product_type = strtoupper($request->input('product_type')[0]).strtoupper($request->input('product_type')[1]);
            }

            $arr_3= explode(' ',trim($request->input('category')));
            if (count($arr_3)> 1) {
                $output_5 = $arr_3[0];
                $output_6 = $arr_3[1];
                $category = strtoupper($output_5[0]).strtoupper($output_6[0]);
            }else {
                $category = strtoupper($request->input('category')[0]).strtoupper($request->input('category')[1]);
            }*/

            $vn_produit = add_product::where('category','LIKE','%'.$request->input('category')."%")
                                    ->Orwhere('product_type','LIKE','%'.$request->input('product_type')."%")
                                    ->get();
            $nb = count($vn_produit);

            $le_referent =  $product_family.$product_type.$category.$nb.(strlen($request->input('product_type')));
            $Add_product->referent = $le_referent;

            $Add_product->title = $request->input('title');
            $Add_product->description = $request->input('description');
            $Add_product->category = $request->input('category');
            $Add_product->quantity = $request->input('quantity');
            $Add_product->price_min = $request->input('price_min');
            $Add_product->price_max = $request->input('price_max');
            $Add_product->alarm_stock = $request->input('alarm_stock');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();// extension
                $filename = time().'.'.$extension;
                $file->move('uploads/stock_agence_A/', $filename);
                $Add_product->image = $filename;
            }else {
                return $request;
                $Add_product->image = '';
            }

            $img = $Add_product->image;
            $array = array();

            $Add_product->product_type = $request->input('product_type');
            $Add_product->provider = $request->input('provider');
            $Add_product->tax = $request->input('tax');
            $Add_product->price_achat = $request->input('price_achat');
            $Add_product->update = json_encode($array);

            $Add_product->save();

            if ($Add_product) {
                $stock_int = new stock_int_a();
                $stock_int->id_mere = $Add_product->id;
                $stock_int->id_emp = $request->input('id_emp');
                $stock_int->name_emp = $request->input('name_emp');
                $stock_int->referent = $le_referent;
                $stock_int->title = $request->input('title');
                $stock_int->quantity = $request->input('quantity');
                $stock_int->price_min = $request->input('price_min');
                $stock_int->price_max = $request->input('price_max');
                $stock_int->image = $img;
                $stock_int->price_achat = $request->input('price_achat');
                $stock_int->total_int = ($request->input('price_achat')*($request->input('quantity')));
                $stock_int->jour_int = DATE('d');
                $stock_int->mois_int = DATE('M');
                //$stock_int->date_int = DATE('Y').'-'.DATE('M').'-'.DATE('d');//DATE('d M Y');//2020-06-28
                $stock_int->date_int = date('Y-m-d H:i:s');
                $stock_int->save();
            }

            //return view('agence_A.add_product')->with('status', 'status');
            return redirect('/add_product')->with('status', 'PRODUIT OK');

        } else {
            return view('/agence_A')->with('status_err', $request);
        }

    }

    public function parameter_products()
    {
        return view('agence_A.parameter_products');
    }

    public function print_list_product()
    {
        return view('agence_A.print_list_product');
    }

    public function form_add_family(Request $request)
    {

        $famille = list_product::find(1);
        if ($famille) {
            $array = array();
            $all_fam = json_decode(($famille->all_familly), true);
            $count = count($all_fam);
            for ($i=0; $i < $count; $i++) {
                array_push($array, $all_fam[$i]);
            }

            array_push($array, $request->input('add_family'));

            $array = json_encode($array);

            $famille->all_familly = $array;
            $famille->save();
            if ($famille) {
                return redirect('/parameter_products')->with('add_family', 'LA FAMILLE A ETE AJOUTEE AVEC SUCCESS');
            } else {
                return redirect('/error_page')->with('error', 'L erreurs est survenu!!!');
            }
        } else {
            return redirect('/error_page')->with('error', "Nous avons rencontre un probleme lors de l'execution");
        }

    }
    public function form_add_type(Request $request)
    {

        $type = list_product::find(1);
        if ($type) {
            $array = array();
            $all_type = json_decode(($type->all_type), true);
            $count = count($all_type);
            for ($i=0; $i < $count; $i++) {
                array_push($array, $all_type[$i]);
            }

            array_push($array, $request->input('add_type'));

            $array = json_encode($array);

            $type->all_type = $array;
            $type->save();
            if ($type) {
                return redirect('/parameter_products')->with('add_family', 'LE TYPE A ETE AJOUTEE AVEC SUCCESS');
            } else {
                return redirect('/error_page')->with('error', 'L erreurs est survenu!!!');
            }
        } else {
            return redirect('/error_page')->with('error', "Nous avons rencontre un probleme lors de l'execution");
        }

    }
    public function form_add_categorie(Request $request)
    {

        $categorie = list_product::find(1);
        if ($categorie) {
            $array = array();
            $all_categorie = json_decode(($categorie->all_categorie), true);
            $count = count($all_categorie);
            for ($i=0; $i < $count; $i++) {
                array_push($array, $all_categorie[$i]);
            }

            array_push($array, $request->input('add_categorie'));

            $array = json_encode($array);

            $categorie->all_categorie = $array;
            $categorie->save();
            if ($categorie) {
                return redirect('/parameter_products')->with('add_family', 'LA CATEGORIE A ETE AJOUTEE AVEC SUCCESS');
            } else {
                return redirect('/error_page')->with('error', 'L erreurs est survenu!!!');
            }
        } else {
            return redirect('/error_page')->with('error', "Nous avons rencontre un probleme lors de l'execution");
        }

    }
}
