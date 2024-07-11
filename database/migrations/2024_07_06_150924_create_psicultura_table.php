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
        Schema::create('psicultura', function (Blueprint $table) {
            $table->integer('IDPsicultura', true);
            $table->string('Nome', 45);
            $table->string('reservatorio', 100)->nullable();
            $table->string('Endereco', 200)->nullable();
            $table->string('Telefone', 45)->nullable();
            $table->string('Email', 100)->nullable();
            $table->integer('Cidade_ID')->index('fk_psicultura_cidade1_idx');
            $table->integer('IDUsuario')->index('fk_psicultura_usuario1_idx');
            $table->string('cnpj', 20);
            $table->string('Aceito', 20)->nullable();
            $table->integer('IDJose')->nullable();

            $table->primary(['IDPsicultura', 'Cidade_ID', 'IDUsuario']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psicultura');
    }
};
