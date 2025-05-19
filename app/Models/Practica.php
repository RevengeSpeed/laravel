<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    // Apunta al nombre exacto de tu tabla
    protected $table = 'practica';

    protected $fillable = [
        'nombre',
        'apellidos',
        'fecha_inicio_universidad',
        'cualidades',
        'habilidades_blandas',
        'certificados',
    ];

    protected $casts = [
        'fecha_inicio_universidad' => 'date',
        'certificados'              => 'array',
    ];
}
