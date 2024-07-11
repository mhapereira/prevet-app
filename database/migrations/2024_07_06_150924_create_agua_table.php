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
        Schema::create('agua', function (Blueprint $table) {
            $table->integer('IDAgua', true);
            $table->integer('IDPsicultura');
            $table->integer('Ponto')->nullable();
            $table->string('IDAmostra', 50);
            $table->dateTime('DataColeta')->nullable();
            $table->string('situacao', 20);
            $table->string('temperatura', 20)->nullable();
            $table->string('oxigenio', 20)->nullable();
            $table->string('saturacao', 20)->nullable();
            $table->string('transparencia', 20)->nullable();
            $table->string('condutividade', 20)->nullable();
            $table->string('salinidade', 20)->nullable();
            $table->double('ph')->nullable();
            $table->double('amonia')->nullable();
            $table->double('nitrito')->nullable();
            $table->double('nitrato')->nullable();
            $table->double('fosforo')->nullable();
            $table->double('turbidez')->nullable();
            $table->double('alcalinidade')->nullable();
            $table->string('IDOrigem', 500)->nullable();
            $table->integer('local_coleta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agua');
    }
};
