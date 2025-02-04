<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'experiencia_laborals';

    // Campos que se pueden llenar de manera masiva
    protected $fillable = [
        'nivel_educativo',
        'titulo_empleado',
        'empresa_actual',
        'cargo_actual',
        'descripcion_responsabilidades',
    ];
}