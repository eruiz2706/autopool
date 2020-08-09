<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosTicket extends Model
{
    protected $table="estados_ticket";

    protected $fillable = [
        'codigo',
        'descripcion'
    ];

    protected $hidden = ['created_at','updated_at'];
}
