<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAcadem extends Model
{
    use HasFactory;
    protected $table = 'formacadem';

protected $fillable = [
    'nivel_educativo',
    'institucion',
    'carrera',
    'titulo',
    'certificaciones',
];
    public $timestamps = false;

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
