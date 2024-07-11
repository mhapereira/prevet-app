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
        DB::statement("CREATE VIEW `VW_GESTAO_AGUA` AS select `p`.`IDPsicultura` AS `Id_Piscicultura`,`a`.`amonia` AS `Amonia`,`a`.`nitrito` AS `Nitrito`,`a`.`nitrato` AS `Nitrato`,`a`.`fosforo` AS `Fosforo`,`a`.`turbidez` AS `Turbidez`,`a`.`alcalinidade` AS `Alcalinidade`,`a`.`Ponto` AS `Ponto`,`a`.`DataColeta` AS `Data` from ((((`prevet55_prevet260`.`agua` `a` join `prevet55_prevet260`.`psicultura` `p` on((`p`.`IDPsicultura` = `a`.`IDPsicultura`))) join `prevet55_prevet260`.`cidade` `c` on((`c`.`ID` = `p`.`Cidade_ID`))) join `prevet55_prevet260`.`aux_laudos` `al` on((convert(`al`.`ID_amostras` using utf8) = `a`.`IDAmostra`))) join `prevet55_prevet260`.`estado` `e` on((`e`.`ID` = `c`.`ID_Estado`)))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `VW_GESTAO_AGUA`");
    }
};
