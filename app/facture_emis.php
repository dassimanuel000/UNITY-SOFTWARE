<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facture_emis extends Model
{
    //
    protected $table = 'facture_emis';
    protected $primaryKey = 'idfacture_emis';
    protected $fillable = ['idfacture_emis','nameClient','idClient','allProduct','allQuantityCommande','allPriceUnitaire','allPriceTotal','remise','totalCommande','totalFacture','autre'];
}
