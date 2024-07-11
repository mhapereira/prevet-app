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
        Schema::create('financeiro_detalhado', function (Blueprint $table) {
            $table->integer('IDFinanceiro');
            $table->integer('IDLaudo');
            $table->decimal('Valor', 10);
            $table->integer('Qtd');
            $table->string('Outros', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financeiro_detalhado');
    }
};
