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
        Schema::create('antibioticos', function (Blueprint $table) {
            $table->integer('IDAntibioticos', true);
            $table->string('Descricao', 45)->nullable();
            $table->string('Medida', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antibioticos');
    }
};
