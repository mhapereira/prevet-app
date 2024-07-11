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
        Schema::table('antibiograma', function (Blueprint $table) {
            $table->foreign(['IDAntibioticos'], 'fk_antibiograma_antibioticos1')->references(['IDAntibioticos'])->on('antibioticos')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antibiograma', function (Blueprint $table) {
            $table->dropForeign('fk_antibiograma_antibioticos1');
        });
    }
};
