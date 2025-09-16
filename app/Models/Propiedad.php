<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{

    protected $table = 'propiedades';

    protected $fillable = [
        'titulo',
        'tipo_id',
        'precio',
        'descripcion',
        'banos',
        'habitaciones',
        'superficie',
        'direccion',
        'ciudad',
        'provincia',
        'imagen',
        'imagenes',
        'user_id'
    ];

    protected $casts = [
        'imagenes' => 'array',
    ];

    public function tipoPropiedad()
    {
        return $this->belongsTo(TipoPropiedad::class, 'tipo_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'DESC');
    }
    
    public function vendedor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
