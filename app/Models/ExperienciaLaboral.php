<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    use HasFactory;

    protected $table = 'experiencia_laborals';

    protected $fillable = [
        'nivel_educativo',
        'titulo_empleado',
        'empresa_actual',
        'cargo_actual',
        'descripcion_responsabilidades',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}