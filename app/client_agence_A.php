<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client_agence_A extends Model
{
    //
    protected $table = 'client_agence_A';
    protected $primaryKey = 'id_client';
    protected $fillable = ['id_client','name_client','adress_client','telephone_client','entreprise_client','sexe_client','account_client'];
}
