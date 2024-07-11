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
        Schema::create('hcomentarios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('tecido', 50);
            $table->text('comentario');
            $table->integer('id_histo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hcomentarios');
    }
};
