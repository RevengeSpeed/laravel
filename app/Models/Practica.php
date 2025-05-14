<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración (crea la tabla).
     */
    public function up(): void
    {
        Schema::create('practicas', function (Blueprint $table) {
            $table->id();

            // Datos personales
            $table->string('nombre');                                           // Nombre del practicante
            $table->string('apellidos');                                        // Apellidos
            $table->date('fecha_inicio_universidad');                           // Fecha de inicio en la universidad

            // Materias reprobadas
            $table->boolean('tiene_reprobadas')->default(false);                // ¿Tiene reprobadas? :contentReference[oaicite:0]{index=0}
            $table->integer('cantidad_reprobadas')->default(0);                 // ¿Cuántas? (0 si no tiene) :contentReference[oaicite:1]{index=1}

            // Cualidades y lenguajes
            $table->text('cualidades')->nullable();                             // Lista de cualidades
            $table->json('lenguajes_programacion')->nullable();                 // JSON array de lenguajes :contentReference[oaicite:2]{index=2}

            // Subida de documentos
            $table->json('certificados')->nullable();                           // Rutas de certificados en JSON array :contentReference[oaicite:3]{index=3}

            $table->timestamps();
        });
    }

    /**
     * Revierte la migración (elimina la tabla).
     */
    public function down(): void
    {
        Schema::dropIfExists('practicas');
    }
};
