<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('dashboard.products');
    }
    //public function ListProducts(){
     //   return view('dashboard.products-list');
    //}
    //public function DetailProducts(){
    //    return view('dashboard.products-details');
    //}
}


/*class agenceAController extends Controller
{
    public function index(){
        return view('pages.agenceA');
    }
}