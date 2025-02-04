<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormacionAcademica extends Model
{
    use HasFactory;
    protected $table = 'formacionacademica';

protected $fillable = [
    'Nombre', 
    'Apellido', 
    'Nacionalidad', 
    'Direccion', 
    'Correo', 
    'Telefono', 
    'Genero', 
    'FechaNacimiento',
];
    public $timestamps = false;
}
