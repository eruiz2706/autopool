<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketDetalle extends Model
{
    protected $table="ticket_detalles";

    protected $fillable = [
        'ticket_id',
        'user_id',
        'descripcion' 
    ];

    protected $hidden = ['created_at'];
}
