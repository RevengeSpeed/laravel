<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    protected $table = 'habilidades';

    protected $fillable = [
        'habilidades_tecnicas', 
        'habilidades_blandas', 
        'idiomas'
       
    ];
        public $timestamps = false;
    }
    

