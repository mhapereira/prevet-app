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
        Schema::create('molecular_bacteriana', function (Blueprint $table) {
            $table->integer('IDBacteriana', true);
            $table->integer('IDPsicultura');
            $table->integer('qtd_amostra');
            $table->string('estatus', 20);
            $table->date('data_coleta');
            $table->date('data_retirada');
            $table->date('data_chegada');
            $table->string('ID_amostra', 20);
            $table->integer('novo');
            $table->date('data_conclusao');
            $table->text('obs')->nullable();
            $table->text('Tipo_exame')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('molecular_bacteriana');
    }
};
