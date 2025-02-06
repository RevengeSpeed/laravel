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
            $table->unsignedBigInteger('user_id')->nullable()->change(); // Permitir valores nulos
        });
    }
    
    public function down()
    {
        Schema::table('formacadem', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change(); // No permitir valores nulos
        });
    }
};