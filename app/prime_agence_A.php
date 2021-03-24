<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prime_agence_A extends Model
{
    //
    protected $table = 'prime_agence_A';
    protected $fillable = ['idprime','matriculeEmp','idEmp','nameEmp','salaireBaseEmp','primeLoyer','primeTransport','primePerformance','primeHeureSub','autreprime'];
}
