<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    //
    protected $table = 'employe';
    protected $primaryKey = 'idEmp';
    protected $fillable = ['idEmp','matricule','nameEmp','prenomEmp', 'telEmp', 'emailEmp','adresseEmp','agenceEmp','sexeEmp','ageEmp','statutEmp','posteEmp','salaireBaseEmp', 'typeEmp', 'image'];
}
