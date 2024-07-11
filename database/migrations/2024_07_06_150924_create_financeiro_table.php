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
        Schema::create('financeiro', function (Blueprint $table) {
            $table->integer('IDFinanceiro', true);
            $table->integer('IDCliente');
            $table->string('Situacao', 20);
            $table->date('Data_analise');
            $table->integer('IDPiscicultura');
            $table->decimal('Total', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financeiro');
    }
};
