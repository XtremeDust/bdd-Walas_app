<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = ['day'];

    function consulta()
    {
        return $this->hasOne(Querie::class, 'Fecha', 'id');  
    }

    function hora()
    {
        return $this->belongsTo(Hour::class, 'hora_fk', 'id');  
    }


}
