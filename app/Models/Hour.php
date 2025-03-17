<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    protected $fillable = ['hour'];

    function fecha()
    {
        return $this->hasOne(Day::class, 'hora_fk', 'id');  
    }

    function consulta()
    {
        return $this->belongsTo(Querie::class, 'Hora', 'id');  
    }
}
