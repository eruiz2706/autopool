<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table="tickets";

    protected $fillable = [
        'titulo',
        'user_id',
        'estado_id',
    ];

    protected $hidden = ['created_at','updated_at'];

    public function estado(){
        return $this->belongsTo(Estados::class,'estado_id');
    }
}
