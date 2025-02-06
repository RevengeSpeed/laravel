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
        Schema::table('formacadem', function (Blueprint $table) {
            // Agregar el campo user_id
            $table->unsignedBigInteger('user_id');

            // Establecer la relación con la tabla users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('formacadem', function (Blueprint $table) {
            // Eliminar la relación y el campo user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
