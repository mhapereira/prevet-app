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
        Schema::table('cidade', function (Blueprint $table) {
            $table->foreign(['ID_Estado'], 'fk_Cidade_Estado1')->references(['ID'])->on('estado')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cidade', function (Blueprint $table) {
            $table->dropForeign('fk_Cidade_Estado1');
        });
    }
};
