<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function formAcadem()
    {
        return $this->hasOne(FormAcadem::class, 'user_id');
    }

    public function habilidades()
    {
        return $this->hasOne(Habilidades::class, 'user_id', 'id');
    }

    public function formacionAcademica()
    {
        return $this->hasOne(FormacionAcademica::class, 'user_id');
    }

    public function experienciaLaboral()
    {
        return $this->hasMany(ExperienciaLaboral::class, 'user_id');
    }

    /**
     * Relación uno a uno con Documento para subir archivos.
     */
    public function documento()
    {
        return $this->hasOne(\App\Models\Documento::class, 'user_id');
    }
}
