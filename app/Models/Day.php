<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'id',
        'day',
    ];

    function consulta()
    {
        return $this->hasOne(Querie::class, 'Fecha', 'id');  
    }
}
