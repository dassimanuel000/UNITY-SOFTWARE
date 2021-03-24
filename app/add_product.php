<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class add_product extends Model
{
    //
    protected $table = 'stock_agence_A';
    protected $fillable = ['referent','title','title','description','category','quantity','price_min','price_max','alarm_stock','image','product_type','provider','tax'];
}
