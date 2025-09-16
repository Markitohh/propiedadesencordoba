<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPropiedad extends Model
{
    protected $table = 'tipos_propiedades';

    protected $fillable = [
        'nombre',
    ];
}
