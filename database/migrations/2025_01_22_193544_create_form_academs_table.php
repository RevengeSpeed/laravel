<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('formacadem', function (Blueprint $table) {
            $table->id();
            $table->string('nivel_educativo')->nullable();
            $table->string('institucion')->nullable();
            $table->string('carrera')->nullable();
            $table->enum('titulo', ['obtenido', 'en-curso'])->nullable();
            $table->string('certificaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_academs');
    }
};
