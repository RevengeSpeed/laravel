<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('practicas', function (Blueprint $table) {
            // Renombramos la columna json
            $table->renameColumn('lenguajes_programacion', 'habilidades_blandas');
        });
    }

    public function down()
    {
        Schema::table('practicas', function (Blueprint $table) {
            // Volvemos al nombre anterior
            $table->renameColumn('habilidades_blandas', 'lenguajes_programacion');
        });
    }
};
