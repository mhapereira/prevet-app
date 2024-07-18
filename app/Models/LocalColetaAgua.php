<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalColetaAgua extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'aux_agua';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'IDAux_agua';

    protected $fillable = [
        'local_coleta',
        'created_at',
        'updated_at'
    ];


    // Método para obter todas as bacias
    public static function getLocalColetaAguaSelectOptions()
    {
        return static::orderBy('local_coleta')->pluck('local_coleta', 'IDAux_agua')->toArray();
    }
}
