<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasVerifiedEmail();
    }

    // Especifica o nome da tabela personalizada
    protected $table = 'usuario';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'IDUsuario';

    protected $fillable = [
        'name',
        'email',
        'password',
        'IDUsuario',
        'Nome',
        'senha',
        'Tipo_usuario_ID',
        'Apelido',
        'email',
        'email2',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function permissao()
    {
        return $this->belongsTo(Permissao::class, 'Tipo_usuario_ID', 'IDTipo_usuario');
    }

    public static function getUsuarioSelectOptions()
    {
        return static::orderBy('name')->pluck('name', 'IDUsuario')->toArray();
    }

}
