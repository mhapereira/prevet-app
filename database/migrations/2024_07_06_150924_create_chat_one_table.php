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
        Schema::create('chat_one', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_usuario')->nullable();
            $table->text('mensagem')->nullable();
            $table->timestamp('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_one');
    }
};
