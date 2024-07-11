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
        DB::statement("CREATE VIEW `VW_GESTAO_RESISTENCIA_ANTIMICROBIANOS` AS select `a`.`ID_Molecular` AS `Bacteria`,`p`.`IDPsicultura` AS `Id_Piscicultura`,`a`.`IDAntibioticos` AS `Id_Antibiotico`,`a`.`Resultados` AS `Resultado`,`m`.`peso` AS `Peso`,(case when (`a`.`Resultados` < 30) then 1 else 0 end) AS `Quantidade_Resistente`,(case when (`a`.`Resultados` <> NULL) then 1 else 1 end) AS `Total`,`m`.`data_campo` AS `Data` from (((`prevet55_prevet260`.`antibiograma` `a` join `prevet55_prevet260`.`material_fraguimentos` `mf` on((`mf`.`IDPeixe` = `a`.`Amostra`))) join `prevet55_prevet260`.`material` `m` on((`m`.`IDMaterial` = `mf`.`IDMaterial`))) join `prevet55_prevet260`.`psicultura` `p` on((`p`.`IDPsicultura` = `m`.`IDPsicultura`))) order by `a`.`IDAntibioticos`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `VW_GESTAO_RESISTENCIA_ANTIMICROBIANOS`");
    }
};
