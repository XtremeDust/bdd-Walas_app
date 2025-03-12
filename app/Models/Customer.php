<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id_customer',
        'fk_user_id',
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');    
    }


}
