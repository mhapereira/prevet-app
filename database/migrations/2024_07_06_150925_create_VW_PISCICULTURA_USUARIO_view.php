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
        DB::statement("CREATE VIEW `VW_PISCICULTURA_USUARIO` AS select `PSI`.`Id_Usuario` AS `Id_Usuario`,`PSI`.`Id_Monitoramento` AS `Id_Monitoramento`,`PSI`.`Status_Monitoramento` AS `Status_Monitoramento`,`PSI`.`Id_Pisicultura` AS `Id_Piscicultura`,`PSI`.`Nome` AS `Nome` from (select `PSU`.`IDUsuario` AS `Id_Usuario`,`PSI`.`IDJose` AS `Id_Monitoramento`,upper(`PSI`.`Aceito`) AS `Status_Monitoramento`,`PSU`.`IDPsicultura` AS `Id_Pisicultura`,upper(`PSI`.`Nome`) AS `Nome` from (`prevet55_prevet260`.`pis_usuario` `PSU` join `prevet55_prevet260`.`psicultura` `PSI` on((`PSU`.`IDPsicultura` = `PSI`.`IDPsicultura`))) union select `prevet55_prevet260`.`psicultura`.`IDUsuario` AS `Id_Usuario`,`prevet55_prevet260`.`psicultura`.`IDJose` AS `Id_Monitoramento`,upper(`prevet55_prevet260`.`psicultura`.`Aceito`) AS `Status_Monitoramento`,`prevet55_prevet260`.`psicultura`.`IDPsicultura` AS `Id_Pisicultura`,upper(`prevet55_prevet260`.`psicultura`.`Nome`) AS `Nome` from `prevet55_prevet260`.`psicultura`) `PSI`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `VW_PISCICULTURA_USUARIO`");
    }
};
