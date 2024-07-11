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
        Schema::create('aux_laudos1', function (Blueprint $table) {
            $table->string('ID_amostras', 50)->nullable();
            $table->date('data_analise')->nullable();
            $table->integer('IDPsicultura')->nullable();
            $table->integer('IDLaudo')->nullable();
            $table->integer('novo')->nullable();
            $table->string('nome_arquivo', 200)->nullable();
            $table->integer('ID', true);
            $table->string('IDprevet', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aux_laudos1');
    }
};
