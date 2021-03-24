<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class horaire extends Model
{
    //
    protected $table = 'horaire';
    protected $fillable = ['idhoraire','matriculeEmp','nameEmp','idEmp','year','month','date','hourstart','minutestart','hourstop','minutestop','otherhoraire'];
}
