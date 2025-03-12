<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'id',
        'servicio',
        'precio_actual',
    ];

    function consulta()
    {
        return $this->hasMany(Querie::class, 'Consulta', 'id');  
    }
}
