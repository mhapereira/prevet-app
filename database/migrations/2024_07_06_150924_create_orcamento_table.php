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
        Schema::create('orcamento', function (Blueprint $table) {
            $table->string('nome_analise', 200)->nullable();
            $table->string('valor_unitario', 10)->nullable();
            $table->string('valor_combo', 10);
            $table->integer('ID', true);
            $table->string('qtd_peixe', 3)->nullable();
            $table->string('modo_envio', 100)->nullable();
            $table->string('etiqueta', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orcamento');
    }
};
