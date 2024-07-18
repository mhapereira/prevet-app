<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoBacteriano extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'laudo_bateriana';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'ID_laudo_Bact';

    protected $fillable = [
        'Bact_ID',
        'Laudo_ID',
        'Amostra',
        'Resultado',
        'Ct',
        'viral_obs',
        'estatus',
        'data_analise',
        'lote',
        'peso_lote',
        'NF',
        'Tipo_exame',
        'created_at',
        'updated_at'
    ];

    // Método para obter todas as bacias
    public static function getResultadoBacterianoSelectOptions()
    {
        return static::orderBy('nome')->pluck('*', 'ID_laudo_Bact')->toArray();
    }
}
