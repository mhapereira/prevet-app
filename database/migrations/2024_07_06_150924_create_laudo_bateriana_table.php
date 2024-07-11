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
        Schema::create('laudo_bateriana', function (Blueprint $table) {
            $table->integer('Bact_ID')->nullable();
            $table->integer('Laudo_ID')->nullable();
            $table->string('Amostra', 20)->nullable();
            $table->string('Resultado', 30)->nullable();
            $table->string('Ct', 20)->nullable();
            $table->text('viral_obs')->nullable();
            $table->string('estatus', 20)->nullable();
            $table->date('data_analise')->nullable();
            $table->string('lote', 100)->nullable();
            $table->string('peso_lote', 6)->nullable();
            $table->integer('ID_laudo_Bact', true);
            $table->integer('NF')->nullable();
            $table->text('Tipo_exame')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laudo_bateriana');
    }
};
