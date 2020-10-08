<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraPool extends Model
{
    protected $table="compras_pool";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','pool_id','secuencia_pool','ciclo_pool','valor'
    ];

}
