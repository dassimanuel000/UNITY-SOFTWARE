<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactureCommande extends Model
{
    protected $table = 'FactureCommande';
    protected $primaryKey = 'idFactureCommande';
    protected $fillable = ['idFactureCommande','identifiantFacture','nameClient','idClient','allProduct','allQuantityCommande','allQuantityRetire','allPriceUnitaire','allPriceTotal','remise','totalCommande','totalFacture'];
}
