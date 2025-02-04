<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiencia_laborals', function (Blueprint $table) {
            $table->id();
            $table->string('nivel_educativo')->nullable();
            $table->string('titulo_empleado')->nullable();
            $table->string('empresa_actual')->nullable();
            $table->string('cargo_actual')->nullable();
            $table->text('descripcion_responsabilidades')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_laborals');
    }
};
