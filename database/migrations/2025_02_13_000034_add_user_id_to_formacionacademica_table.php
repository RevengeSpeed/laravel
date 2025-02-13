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
        Schema::table('formacionacademica', function (Blueprint $table) {
            // Agregar la columna user_id
            $table->unsignedBigInteger('user_id')->nullable()->after('FechaNacimiento');
    
            // Si deseas establecer una relación con la tabla users, agrega una clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formacionacademica', function (Blueprint $table) {
            //
        });
    }
};
