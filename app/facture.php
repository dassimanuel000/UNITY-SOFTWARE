<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    //
    protected $table = 'facture';
    protected $primaryKey = 'idFacture';
    protected $fillable = ['idFacture','identifiantFacture','nameProduct','idClient','quantityProduct','priceMinProduct','priceMaxProduct','taxeProduct'];
}
