<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facture_print extends Model
{
    protected $table = 'facture_print';
    protected $primaryKey = 'idfactureprint';
    protected $fillable = ['idfactureprint','nameClient','idClient','allProduct','allQuantityCommande','allQuantityRetire','allPriceUnitaire','allPriceTotal','remise','totalCommande','totalLivre','totalFacture'];
}
