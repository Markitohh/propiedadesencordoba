<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{   
    use HasFactory;

    protected $fillable = [
        'user_id',
        'propiedad_id',
        'date',
        'hour',
        'tel'
    ];

     protected $casts = [
        'date' => 'date',
        'hour' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
