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
        DB::statement("CREATE VIEW `VW_ANALISES` AS select `AXL`.`Id_Analise` AS `Id_Analise`,`AXL`.`Nome` AS `Nome` from (select `LAU`.`IDLaudo` AS `Id_Analise`,`LAU`.`Descricao` AS `Nome` from `prevet55_prevet260`.`laudo` `LAU` where (`LAU`.`IDLaudo` in (2,3,6)) union all select '4' AS `Id_Analise`,'Resistência à Antimicrobianos' AS `Nome`) `AXL` order by `AXL`.`Id_Analise`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `VW_ANALISES`");
    }
};
