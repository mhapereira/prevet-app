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
        DB::statement("CREATE VIEW `VW_GESTAO_MOLECULAR_VIRAL` AS select `MV`.`data_coleta` AS `Data`,`MV`.`IDPsicultura` AS `Id_Piscicultura`,`LV`.`peso_lote` AS `Peso`,`LV`.`Resultado` AS `Resultado`,`LV`.`NF` AS `Tipo` from (`prevet55_prevet260`.`laudo_viral` `LV` join `prevet55_prevet260`.`molecular_viral` `MV` on((`LV`.`Viral_ID` = `MV`.`IDViral`))) order by `MV`.`data_coleta` desc");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `VW_GESTAO_MOLECULAR_VIRAL`");
    }
};
