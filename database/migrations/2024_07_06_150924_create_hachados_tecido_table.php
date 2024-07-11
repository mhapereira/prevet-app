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
        Schema::create('hachados_tecido', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('tecido')->nullable();
            $table->integer('achado');
            $table->string('incidencia', 200)->nullable();
            $table->integer('id_histo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hachados_tecido');
    }
};
