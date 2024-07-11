<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW `VW_GESTAO_MICROBIOLOGICO` AS select `m`.`data_campo` AS `Data`,`m`.`IDPsicultura` AS `Id_Piscicultura`,`m`.`peso` AS `Peso`,(case when (`a`.`ID_Molecular` = '') then 'Em andamento' else `a`.`ID_Molecular` end) AS `Bacteria`,count(`a`.`ID_Molecular`) AS `Quantidade` from ((`prevet55_prevet260`.`aux_anti` `a` join `prevet55_prevet260`.`material_fraguimentos` `mf` on((convert(`mf`.`IDPeixe` using utf8) = `a`.`Amostra`))) join `prevet55_prevet260`.`material` `m` on((`m`.`IDMaterial` = `mf`.`IDMaterial`))) group by `m`.`peso`,`m`.`data_campo`,`m`.`IDPsicultura`,`a`.`ID_Molecular`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `VW_GESTAO_MICROBIOLOGICO`");
    }
};
