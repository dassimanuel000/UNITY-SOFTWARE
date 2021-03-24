<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Chef_agence_AController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('agence_A.agence_A');
    }
}
