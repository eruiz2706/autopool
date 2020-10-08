<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraPoolDetalle extends Model
{
    protected $table="compras_pool_detalle";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'compra_id','user_id','valor','descripcion'
    ];

}
