<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Documento extends Model
{
  protected $fillable = [
    'user_id',
    'perfil',
    'titulo',
    'certificados',
    'certificados_externos',
];

    protected $casts = [
        'certificados' => 'array',
        'certificados_externos' => 'array',
    ];
}

