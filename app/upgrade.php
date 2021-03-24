<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upgrade extends Model
{
    //
    protected $table = 'upgrade';
    protected $primaryKey = 'idupgrade';
    protected $fillable = ['idupgrade','identifiant_upgrade','matricule_upgrade','question','objectif','importance','examinateur','autre'];
}
