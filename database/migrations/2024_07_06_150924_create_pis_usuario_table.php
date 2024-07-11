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
        Schema::create('pis_usuario', function (Blueprint $table) {
            $table->integer('IDPsicultura')->nullable();
            $table->integer('IDUsuario')->nullable();
            $table->integer('IDpis_usuario', true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pis_usuario');
    }
};
