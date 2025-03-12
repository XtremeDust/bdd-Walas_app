<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    protected $fillable = [
        'id',
        'hour',
    ];

    function consulta()
    {
        return $this->belongsTo(Querie::class, 'Hora', 'id');  
    }
}
