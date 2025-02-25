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
        Schema::table('habilidades', function (Blueprint $table) {
            // Verifica si la columna user_id ya existe
            if (!Schema::hasColumn('habilidades', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
            }
            // Agrega la clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('habilidades', function (Blueprint $table) {
            // Elimina la clave foránea y la columna si existen
            if (Schema::hasColumn('habilidades', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }

};
