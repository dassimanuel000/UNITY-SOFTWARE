<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class agenceAController extends Controller
{
    public function index(){
        return view('pages.agenceA');
    }
}