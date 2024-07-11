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
        Schema::create('molecular_viral', function (Blueprint $table) {
            $table->integer('IDViral', true);
            $table->integer('IDPsicultura');
            $table->integer('qtd_amostra')->nullable();
            $table->text('obs')->nullable();
            $table->string('estatus', 20)->nullable();
            $table->date('data_coleta')->nullable();
            $table->date('data_retirada')->nullable();
            $table->date('data_chegada')->nullable();
            $table->string('ID_amostra', 20)->nullable();
            $table->integer('novo')->nullable();
            $table->date('data_conclusao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('molecular_viral');
    }
};
