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
        Schema::create('antibiograma', function (Blueprint $table) {
            $table->integer('IDAntibioticos')->index('fk_antibiograma_antibioticos1_idx');
            $table->string('ID_Molecular', 45)->nullable();
            $table->string('Resultados', 45)->nullable();
            $table->string('Estatus', 50)->nullable();
            $table->string('Amostra', 45)->nullable();
            $table->integer('ID', true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antibiograma');
    }
};
