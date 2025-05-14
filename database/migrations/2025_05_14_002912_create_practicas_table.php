<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('practicas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_inicio_universidad');
            $table->boolean('tiene_reprobadas')->default(false);
            $table->text('cualidades')->nullable();
            $table->json('lenguajes_programacion')->nullable();
            $table->json('certificados')->nullable(); // almacenará rutas a archivos
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practicas');
    }
};
