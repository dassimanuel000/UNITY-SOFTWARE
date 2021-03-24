<?php

namespace App\Http\Controllers\agence_A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as DB;

class all_productController extends Controller
{
    //
    public function index(){
        $stateCOMMANDE = DB::update('update state set stateCOMMANDE = 0 where idstate = 2');
        return view('agence_A.all_product');
    }

    public function agence_A_stock_int()
    {
        return view('agence_A.stock_int');
    }

    public function agence_A_stock_out()
    {
        return view('agence_A.stock_out');
    }

    public function agence_A_cash_int()
    {
        return view('agence_A.cash_int');
    }

    public function agence_A_cash_out()
    {
        return view('agence_A.cash_out');
    }

    public function compta_print($request)
    {
        return view('agence_A.compta_print')->with('request', $request);
    }

    public function form_compta_print(Request $request)
    {
        if (($request->input('request')) == "stock_int") {

            //$stock_int_a = DB::table('stock_int_a')->orderBy('created_at', 'ASC')->get();
            $request = 1;
            return redirect('/compta_print/'.$request.'')->with('request', $request);

        } elseif (($request->input('request')) == "stock_out") {

            $request = 2;
            return redirect('/compta_print/'.$request.'')->with('request', $request);

        }elseif (($request->input('request')) == "cash_int") {
            $request = 3;
            return redirect('/compta_print/'.$request.'')->with('request', $request);
        }elseif (($request->input('request')) == "cash_out") {
            $request = 4;
            return redirect('/compta_print/'.$request.'')->with('request', $request);
        }else {
            $request = 0;
            return redirect('/compta_print/'.$request.'')->with('request', $request);
        }

    }
}
