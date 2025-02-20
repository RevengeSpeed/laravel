<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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



}
