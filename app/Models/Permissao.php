<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'tipo_usuario';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'IDTipo_usuario';

    protected $fillable = [
        'Descricao',
        'created_at',
        'updated_at'
    ];

    // Método para obter todas as bacias
   public static function getPermissaoSelectOptions()
   {
       return static::orderBy('IDTipo_usuario')->pluck('Descricao', 'IDTipo_usuario')->toArray();
   }
}
