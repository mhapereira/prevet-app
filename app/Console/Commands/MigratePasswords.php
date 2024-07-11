<?php

namespace App\Console\Commands;

use App\Models\Usuario;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MigratePasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passwords:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate passwords from MD5 to Bcrypt';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            // Atualiza a senha apenas se estiver no formato MD5
            if ($this->isMD5($usuario->senha)) {
                $usuario->senha = Hash::make($usuario->senha);
                $usuario->save();
            }
        }

        $this->info('Passwords migrated successfully.');
    }

    private function isMD5($password)
    {
        return preg_match('/^[a-f0-9]{32}$/', $password);
    }
}
