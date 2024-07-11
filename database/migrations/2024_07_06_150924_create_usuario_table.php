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
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('IDUsuario', true);
            $table->string('Nome', 100);
            $table->string('senha', 50);
            $table->integer('Tipo_usuario_ID')->index('fk_usuario_tipo_usuario1_idx');
            $table->string('Apelido', 45)->nullable();
            $table->string('email', 80)->nullable();
            $table->string('email2', 100)->nullable();

            $table->primary(['IDUsuario', 'Tipo_usuario_ID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
