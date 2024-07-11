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
        Schema::create('histologia', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_histo');
            $table->dateTime('data_histo');
            $table->integer('id_piscicultura')->nullable();
            $table->date('data_coleta')->nullable();
            $table->string('tanque_viveiro', 500)->nullable();
            $table->date('data_recebimento')->nullable();
            $table->string('IDPrevet', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histologia');
    }
};
