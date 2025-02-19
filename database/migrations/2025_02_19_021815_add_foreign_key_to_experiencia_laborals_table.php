<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToExperienciaLaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiencia_laborals', function (Blueprint $table) {
            // Verifica si la columna user_id ya existe
            if (!Schema::hasColumn('experiencia_laborals', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
            }
            // Agrega la clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiencia_laborals', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}