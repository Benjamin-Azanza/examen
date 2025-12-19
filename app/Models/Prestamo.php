<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'titulo_libro',
        'nombre_persona',
        'telefono',
        'fecha_limite',
        'devuelto'
    ];

    protected $casts = [
        'fecha_limite' => 'date',
        'devuelto' => 'boolean'
    ];
}
