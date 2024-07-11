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
        Schema::create('material', function (Blueprint $table) {
            $table->integer('IDMaterial', true);
            $table->text('Descricao');
            $table->integer('Quantidade');
            $table->string('Refrigeracao', 100);
            $table->string('Especie', 200);
            $table->integer('IDPsicultura')->index('fk_material_psicultura1_idx');
            $table->date('Data_coleta')->nullable();
            $table->string('Estatus', 45)->nullable();
            $table->date('data_campo')->nullable();
            $table->string('tank', 500)->nullable();
            $table->float('peso')->nullable();
            $table->text('Conclusao')->nullable();
            $table->date('data_conclusao')->nullable();
            $table->string('arquivo', 200)->nullable();

            $table->primary(['IDMaterial', 'IDPsicultura']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material');
    }
};
