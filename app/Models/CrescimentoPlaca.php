<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrescimentoPlaca extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'crescimento_placa';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];



    // Método para obter todas as bacias
    public static function getCrescimentoPlacaSelectOptions()
    {
        return static::orderBy('name')->pluck('name', 'name')->toArray();
    }
}
