<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Practica extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre',
        'apellidos',
        'fecha_inicio_universidad',
        'tiene_reprobadas',
        'cantidad_reprobadas',
        'cualidades',
        'habilidades_blandas',   
        'certificados',
    ];

   
    protected $casts = [
        'fecha_inicio_universidad' => 'date',
        'tiene_reprobadas'         => 'boolean',
        'cantidad_reprobadas'      => 'integer',
        'cualidades'               => 'string',
        'habilidades_blandas'      => 'array',
        'certificados'             => 'array',
    ];

   
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
