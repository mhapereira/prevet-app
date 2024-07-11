<?php

use Illuminate\Support\Facades\File;

// Carregar o Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Pasta onde as migrações foram geradas
$migrationPath = database_path('migrations');

// Obter lista de arquivos de migração
$migrationFiles = File::files($migrationPath);

// Pasta onde os modelos serão criados
$modelsPath = app_path('Models');

foreach ($migrationFiles as $file) {
    $fileName = pathinfo($file, PATHINFO_FILENAME);

    // Verificar se é um arquivo de migração
    if (strpos($fileName, 'create_') === 0) {
        // Extrair nome da tabela da migração
        preg_match('/create_(\w+)_table/', $fileName, $matches);

        if (isset($matches[1])) {
            $tableName = $matches[1];
            $modelName = ucfirst(camel_case($tableName));

            // Verificar se o modelo já existe
            if (!File::exists("$modelsPath/$modelName.php")) {
                // Criar modelo
                $modelContent = "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass $modelName extends Model\n{\n    protected \$guarded = [];\n}";
                File::put("$modelsPath/$modelName.php", $modelContent);
                echo "Modelo $modelName criado com sucesso.\n";
            }
        }
    }
}

echo "Modelos criados com sucesso.\n";
