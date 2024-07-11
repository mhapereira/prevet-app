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
        DB::statement("CREATE VIEW `VW_ANALISE_PISCICULTURA` AS select `AXL`.`IDPsicultura` AS `Id_Piscicultura`,`AXL`.`IDLaudo` AS `Id_Analise`,max(`LAD`.`Descricao`) AS `Nome`,count(`AXL`.`IDLaudo`) AS `Quantida_Analise` from (`prevet55_prevet260`.`aux_laudos` `AXL` join `prevet55_prevet260`.`laudo` `LAD` on((`AXL`.`IDLaudo` = `LAD`.`IDLaudo`))) group by `AXL`.`IDPsicultura`,`AXL`.`IDLaudo`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `VW_ANALISE_PISCICULTURA`");
    }
};
