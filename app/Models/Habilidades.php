<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    use HasFactory;
    protected $table = 'habilidades';

    protected $fillable = [
        'habilidades_tecnicas', 
        'habilidades_blandas', 
        'idiomas'
       
    ];
        public $timestamps = false;

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
    }
    

