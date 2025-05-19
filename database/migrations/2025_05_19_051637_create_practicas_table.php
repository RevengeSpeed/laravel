<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticasTable extends Migration
{
    public function up()
    {
        Schema::create('practica', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_inicio_universidad');
            $table->text('cualidades')->nullable();
            $table->text('habilidades_blandas')->nullable();
            $table->json('certificados')->nullable(); // almacenaremos rutas en JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('practicas');
    }
}
