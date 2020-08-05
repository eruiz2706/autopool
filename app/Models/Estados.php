<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table="estados";

    protected $fillable = [
        'tipo',
        'codigo',
        'descripcion'
    ];

    protected $hidden = ['created_at'];
}
