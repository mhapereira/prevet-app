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
        Schema::create('material_fraguimentos', function (Blueprint $table) {
            $table->integer('IDMaterial')->index('fk_material_has_fraguimentos_material1_idx');
            $table->integer('IDFraguimentos')->index('fk_material_has_fraguimentos_fraguimentos1_idx');
            $table->integer('IDMeioCultura')->index('fk_material_fraguimentos_meio_cultura1_idx');
            $table->string('resultado', 200)->nullable();
            $table->string('estatus', 10)->nullable();
            $table->string('morfologia', 45)->nullable();
            $table->integer('IDLaudo')->index('fk_material_fraguimentos_laudo1_idx');
            $table->string('IDPeixe', 45);
            $table->text('obs')->nullable();
            $table->integer('verifica')->nullable();

            $table->primary(['IDMaterial', 'IDFraguimentos', 'IDMeioCultura', 'IDLaudo', 'IDPeixe']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_fraguimentos');
    }
};
