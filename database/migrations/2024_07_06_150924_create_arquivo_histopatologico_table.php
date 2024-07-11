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
        Schema::create('arquivo_histopatologico', function (Blueprint $table) {
            $table->integer('ID', true);
            $table->string('nome_arquivo', 200)->nullable();
            $table->date('data_analise')->nullable();
            $table->string('Estatus', 45)->nullable();
            $table->string('ID_Origem', 45)->nullable();
            $table->integer('IDLaudo')->index('fk_arquivo_histopatologico_laudo1_idx');
            $table->integer('IDPsicultura')->index('fk_arquivo_histopatologico_psicultura1_idx');
            $table->integer('qtd_amostra')->nullable();
            $table->integer('vizu')->nullable();
            $table->date('data_disponivel')->nullable();

            $table->primary(['ID', 'IDLaudo', 'IDPsicultura']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arquivo_histopatologico');
    }
};
