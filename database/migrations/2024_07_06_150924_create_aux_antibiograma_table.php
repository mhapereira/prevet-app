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
        Schema::create('aux_antibiograma', function (Blueprint $table) {
            $table->integer('ID_antibiotico')->nullable();
            $table->string('ID_molecular', 50)->nullable();
            $table->string('amostra', 10);
            $table->integer('IDAux_antibiograma', true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aux_antibiograma');
    }
};
