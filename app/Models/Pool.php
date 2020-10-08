<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $table = "pools";

    protected $fillable = [
        'valor',
        'color',
        'cantidad_pool',
        'id_pool',
        'secuencia_pool',
        'secuencia_retiro'
    ];

    protected $hidden = ['created_at','updated_at'];
}
