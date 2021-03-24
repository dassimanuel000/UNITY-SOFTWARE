<?php

namespace App\Http\Controllers\agence_A;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\employe;
use App\horaire;
use DB;

class personnelController extends Controller
{
    //
    public function horaire()
    {
      return view('agence_A.horaire')->with('horaire');
    }
    public function search_horaire(Request $request)
    {

       if($request->ajax()){

         $output="";
         $i=0;

         $search_horaire = employe::where('nameEmp','LIKE','%'.$request->search."%")
                                            ->Orwhere('matricule','LIKE','%'.$request->search."%")
                                            ->get();

         if($search_horaire){

            foreach ($search_horaire as  $product) {

             $output.='<tr>'.

             '<td>'.'<span class="text-muted">'.$product->idEmp.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->matricule.'</span>'.'</td>'.

             '<td>'.$product->nameEmp.' '.$product->prenomEmp.'</td>'.

             '<td>'.$product->posteEmp.'</td>'.

             '<td>'.Carbon::parse($product->created_at)->diffforHumans().'</td>'.

             '<td>'.
                '<a href="/add_horaire/'.$product->idEmp.'" class="btn btn-success waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-hospital">'.'</i>'.'</a>'.
             '</td>'.

             '</tr>';

              $i++;
            }
            return $output;

         }

       }

    }
    public function add_horaire(Request $request, $idEmp)
    {
        $add_horaire = employe::find($idEmp);
        //$add_horaire = DB::select('select * from employe where idEmp = '.$idEmp.' ');
        return view('agence_A.add_horaire')->with('add_horaire', $add_horaire);
    }

    public function form_add_horaire(Request $request)
    {
       $add_horaire = new horaire();
       $add_horaire->matriculeEmp = $request->input('matriculeEmp');
       $add_horaire->nameEmp = $request->input('nameEmp');
       $add_horaire->idEmp = $request->input('idEmp');
       $add_horaire->year = $request->input('year');
       $add_horaire->month = $request->input('month');
       $add_horaire->date = $request->input('date');
       $add_horaire->hourstart = $request->input('hourstart');
       $add_horaire->minutestart = $request->input('minutestart');
       $add_horaire->hourstop = $request->input('hourstop');
       $add_horaire->minutestop = $request->input('minutestop');
       $add_horaire->otherhoraire = "";
       $add_horaire->save();

       return redirect('/horaire')->with('add_horaire', 'L Horaire est bien enregistree correctly!!!');
    }
    public function view_horaire()
    {
      return view('agence_A.view_horaire')->with('view_horaire');
    }
    public function search_view_horaire(Request $request)
    {
      if($request->ajax()){

         $output="";
         $i=0;

         $search_horaire = employe::where('nameEmp','LIKE','%'.$request->search."%")
                                            ->Orwhere('matricule','LIKE','%'.$request->search."%")
                                            ->get();

         if($search_horaire){

            foreach ($search_horaire as  $product) {

             $output.='<tr>'.

             '<td>'.'<span class="text-muted">'.$product->idEmp.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->matricule.'</span>'.'</td>'.

             '<td>'.$product->nameEmp.' '.$product->prenomEmp.'</td>'.

             '<td>'.$product->posteEmp.'</td>'.

             '<td>'.Carbon::parse($product->created_at)->diffforHumans().'<br> Fait le :'.(date('d F Y', strtotime($product->created_at))).'<br> Modifie le :'.date('d F Y H:i:s', strtotime($product->updated_at)).'</td>'.

             '<td>'.
                '<a href="/list_horaire/'.$product->idEmp.'" class="btn btn-primary waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-camera">'.'</i>'.'</a>'.
             '</td>'.

             '</tr>';

              $i++;
            }
            return $output;

         }

       }
    }
    public function list_horaire(Request $request, $idEmp)
    {
      $list_horaire = employe::find($idEmp);
      return view('agence_A.list_horaire')->with('list_horaire', $list_horaire);
    }
}
