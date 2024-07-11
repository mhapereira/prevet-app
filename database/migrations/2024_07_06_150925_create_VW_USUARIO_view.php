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
        DB::statement("CREATE VIEW `VW_USUARIO` AS select `prevet55_prevet260`.`usuario`.`IDUsuario` AS `Id_Usuario`,`prevet55_prevet260`.`usuario`.`Tipo_usuario_ID` AS `Id_Tipo_Usuario`,(case when (`prevet55_prevet260`.`usuario`.`Tipo_usuario_ID` = 5) then 'Admin' when (`prevet55_prevet260`.`usuario`.`Tipo_usuario_ID` = 6) then 'User' when (`prevet55_prevet260`.`usuario`.`Tipo_usuario_ID` = 7) then 'Histo' end) AS `Tipo_Usuario`,`prevet55_prevet260`.`usuario`.`Nome` AS `Nome`,`prevet55_prevet260`.`usuario`.`Apelido` AS `Apelido`,`prevet55_prevet260`.`usuario`.`email` AS `Email_Primario`,`prevet55_prevet260`.`usuario`.`email2` AS `Email_Secundario`,`prevet55_prevet260`.`usuario`.`senha` AS `Senha` from `prevet55_prevet260`.`usuario`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `VW_USUARIO`");
    }
};
