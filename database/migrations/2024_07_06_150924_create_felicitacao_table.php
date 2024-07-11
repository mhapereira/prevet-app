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
        Schema::create('felicitacao', function (Blueprint $table) {
            $table->integer('ID_F', true);
            $table->string('Arquivo', 200)->nullable();
            $table->text('Descrição')->nullable();
            $table->string('Codigo', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('felicitacao');
    }
};
