<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MostrarPracticas extends Model
{
    use HasFactory;

    protected $table = 'practicas'; // Indicamos que se usará la tabla 'practicas'

    protected $fillable = [
        'nombre',
        'apellidos',
        'fecha_inicio_universidad',
        'tiene_reprobadas',
        'cantidad_reprobadas',
        'cualidades',
        'lenguajes_programacion',
        'certificados'
    ];
}
