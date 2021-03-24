<?php

namespace App\Http\Controllers\Dashboard;

use App\employe;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\upgrade;
use Illuminate\Support\Facades\DB as DB;

class DashboardController extends Controller
{
    //
    public function registered(){

        $users = User::all();

        return view('dashboard.register')->with('users', $users);
    }

    public function registeredit(Request $request, $id){

        $users = User::findOrfail($id);
        return view('dashboard.register-edit')->with('users',$users);
    }

    public function registerupdate(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->phone = $request->input('phone');
        $users->usertype = $request->input('usertype');
        $users->email = $request->input('email');
        $users->update();

        return redirect('/role-register')->with("l'utilisateur a bien ete modifie, Monsieur");
    }

    public function registerdelete($id)
    {
        # code...
        $users = User::findOrfail($id);
        $users->delete();

        return redirect('/role-register')->with("l'utilisateur a bien ete SUPPRIMER, Monsieur");
    }
    public function stat_agenceA()
    {
        return view('dashboard.stat_agenceA')->with('stat_agenceA');
    }

    public function add_employe()
    {
        return view('dashboard.add_employe')->with('add_employe');
    }
    public function form_add_employe(Request $request)
    {

      $employe = new employe();

      $employe->nameEmp = $request->input('nameEmp');
      $employe->prenomEmp = $request->input('prenomEmp');
      $employe->telEmp = $request->input('telEmp');
      $employe->emailEmp = $request->input('emailEmp');
      $employe->adresseEmp = $request->input('adresseEmp');
      $employe->agenceEmp = $request->input('agenceEmp');
      $employe->sexeEmp = $request->input('sexeEmp');
      $employe->ageEmp = $request->input('ageEmp');
      $employe->statutEmp = $request->input('statutEmp');
      $employe->posteEmp = $request->input('posteEmp');
      $employe->salaireBaseEmp = $request->input('salaireBaseEmp');
      $employe->typeEmp = $request->input('typeEmp');
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();// extension
        $filename = time().'.'.$extension;
        $file->move('uploads/employe/', $filename);
        $employe->image = $filename;
      }else {
        return $request;
        $employe->image = '';
      }

      $random = DB::select('select matricule from employe ');
      $random = count($random);
      $employe->matricule = strtoupper(substr($employe->agenceEmp, 0,2)).strtoupper(substr($employe->nameEmp, 0,2)).strtoupper(substr($employe->prenomEmp, 0,2)).$random.substr($employe->ageEmp, -2,2);

      $employe->save();

      return redirect('/list_employe')->with('employe', 'employe Agence saved correctly!!!');

    }
    public function list_employe()
    {
        return view('dashboard.list_employe')->with('list_employe');
    }
    public function search_employe(Request $request)
    {

       if($request->ajax()){

         $output="";
         $i=0;

         $search_employe = employe::where('nameEmp','LIKE','%'.$request->search."%")
                                            ->Orwhere('matricule','LIKE','%'.$request->search."%")
                                            ->get();

         if($search_employe){

            foreach ($search_employe as  $product) {

             $output.='<tr>'.

             '<td>'.'<span class="text-muted">'.$product->idEmp.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->matricule.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->nameEmp.' '.$product->prenomEmp.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->adresseEmp.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->agenceEmp.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->ageEmp.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->statutEmp.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->posteEmp.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$product->salaireBaseEmp.'</span>'.'</td>'.

             '<td>'.Carbon::parse($product->created_at)->diffforHumans().'<br> Fait le :'.(date('d F Y', strtotime($product->created_at))).'<br> Modifie le :'.date('d F Y H:i:s', strtotime($product->updated_at)).'</td>'.

             '<td>'.
                '<a href="/voir_employe/'.$product->idEmp.'" class="btn btn-primary waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-camera">'.'</i>'.'</a>'.
             '</td>'.

             '<td>'.
                '<a href="/edit_employe/'.$product->idEmp.'" class="btn btn-success waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-edit">'.'</i>'.'</a>'.
             '</td>'.

             '<td>'.
                '<a href="/delete_employe/'.$product->idEmp.'" class="btn btn-danger waves-effect waves-float waves-green"  onclick="confirm("vous etes sure?");" >'.'<i class="zmdi zmdi-delete">'.'</i>'.'</a>'.
             '</td>'.

             '</tr>';

              $i++;
            }
            return $output;

         }

       }
    }
    public function edit_employe(Request $request, $idEmp)
    {
        $edit_employe = employe::findOrfail($idEmp);
        return view('dashboard.edit_employe')->with('edit_employe',$edit_employe);
    }
    public function voir_employe(Request $request, $idEmp)
    {
        $voir_employe = employe::findOrfail($idEmp);
        return view('dashboard.voir_employe')->with('voir_employe',$voir_employe);
    }
    public function form_update_employe(Request $request, $idEmp)
    {
        $employe = employe::find($idEmp);
        $employe->nameEmp = $request->input('nameEmp');
        $employe->prenomEmp = $request->input('prenomEmp');
        $employe->telEmp = $request->input('telEmp');
        $employe->emailEmp = $request->input('emailEmp');
        $employe->adresseEmp = $request->input('adresseEmp');
        $employe->agenceEmp = $request->input('agenceEmp');
        $employe->sexeEmp = $request->input('sexeEmp');
        $employe->ageEmp = $request->input('ageEmp');
        $employe->statutEmp = $request->input('statutEmp');
        $employe->posteEmp = $request->input('posteEmp');
        $employe->typeEmp = $request->input('typeEmp');
        $employe->salaireBaseEmp = $request->input('salaireBaseEmp');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();// extension
            $filename = time().'.'.$extension;
            $file->move('uploads/employe/', $filename);
            $employe->image = $filename;
        }else {
            return $request;
            $employe->image = '';
        }
        $employe->update();
        return redirect('/list_employe')->with('update_employe', 'employe Agence Update correctly!!!');
    }
    public function delete_employe($idEmp)
    {
        # code...
        $delete_employe = employe::findOrfail($idEmp);
        $delete_employe->delete();
        return redirect('/list_employe')->with('delete_employe', 'employe Agence Delete correctly!!!');
    }
    public function salaire_employe()
    {
        # code...
        return view('dashboard.salaire_employe')->with('salaire_employe');
    }

    public function add_upgrade()
    {
        # code...
        return view('dashboard.add_upgrade')->with('add_upgrade');
    }
    public function upgrade()
    {
        # code...
        return view('dashboard.upgrade')->with('upgrade');
    }
    public function form_add_upgrade(Request $request)
    {
        $add_upgrade = new upgrade();

        $random = DB::select('select * from upgrade ');
        $random = count($random);
        $add_upgrade->identifiant_upgrade = date('H').date('m').$random;
        $add_upgrade->matricule_upgrade = $request->input('matricule_upgrade');
        $add_upgrade->objectif = $request->input('objectif');
        $add_upgrade->importance = $request->input('importance');
        $add_upgrade->examinateur = $request->input('examinateur');

        $array = array();
        $count = 10;

        for ($i=0; $i < $count; $i++) {
            array_push($array, $request->input('question_'.$i));
        }
        $add_upgrade->question = json_encode($array);
        $add_upgrade->autre = "";
        $add_upgrade->save();

        return redirect('/upgrade')->with('upgrade', 'Evaluations saved correctly!!!');
    }
    public function edit_upgrade(Request $request, $idupgrade)
    {
        $edit_upgrade = upgrade::findOrfail($idupgrade);
        return view('dashboard.edit_upgrade')->with('edit_upgrade',$edit_upgrade);
    }
    public function form_edit_upgrade(Request $request, $idupgrade)
    {
        $update_upgrade = upgrade::find($idupgrade);
        $update_upgrade->matricule_upgrade = $request->input('matricule_upgrade');
        $update_upgrade->objectif = $request->input('objectif');
        $update_upgrade->importance = $request->input('importance');
        $update_upgrade->examinateur = $request->input('examinateur');

        $array = array();
        $count = 10;

        for ($i=0; $i < $count; $i++) {
            array_push($array, $request->input('question_'.$i));
        }
        $update_upgrade->question = json_encode($array);
        $update_upgrade->autre = "";
        $update_upgrade->update();

        return redirect('/upgrade')->with('upgrade', 'Evaluations Updated correctly!!!');
    }
    public function delete_upgrade($idupgrade)
    {
        $delete_upgrade = upgrade::findOrfail($idupgrade);
        $delete_upgrade->delete();
        return redirect('/upgrade')->with('upgrade', 'Evaluations Delete correctly!!!');
    }
    public function print_upgrade(Request $request, $idupgrade)
    {
        $print_upgrade = upgrade::findOrfail($idupgrade);
        return view('dashboard.print_upgrade')->with('print_upgrade',$print_upgrade);
    }

    public function add_prime(Request $request, $idEmp)
    {
        //$add_prime = prime_agence_A::findOrfail($idEmp);
        $idEmp = employe::findOrfail($idEmp);
        return view('dashboard.add_prime')->with('idEmp',$idEmp);
    }

    public function parametre_agence()
    {
        return view('dashboard.parametre_agence');
    }

    public function form_update_initial(Request $request)
    {
        //$update_initial = User::where('initial_agence','LIKE','%'.$request->input('agence')."%")
          //                          ->get();
        $update_initial = DB::update('update users set initial_agence = "'.strtoupper($request->input('new_initial')).'" where usertype = "'.$request->input('agence').'"');

        //$update_initial = User::find($request->input('agence'));
        if ($update_initial) {
            //$update_initial->initial_agence = $request->input('new_initial');
            //$update_initial->update();
            return redirect('/parametre_agence')->with('parametre_agence', "L'INITIAL A ETE BIEN MODIFIE ");
        } else {
            return redirect('/error_page')->with('error', "Nous avons rencontre un probleme lors de l'execution");
        }

    }

    public function print_paye($idEmp)
    {
        $print_paye = employe::findOrfail($idEmp);
        return view('dashboard.print_paye')->with('print_paye',$print_paye);
    }
}
