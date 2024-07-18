<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agua extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'agua';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'IDAgua';

    protected $fillable = [
        'IDPsicultura',
        'Ponto',
        'IDAmostra',
        'DataColeta',
        'situacao',
        'temperatura',
        'oxigenio',
        'saturacao',
        'transparencia',
        'condutividade',
        'salinidade',
        'ph',
        'amonia',
        'nitrito',
        'nitrato',
        'fosforo',
        'turbidez',
        'alcalinidade',
        'IDOrigem',
        'local_coleta',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'IDPeixe' => 'string',
    ];

    public static function query(): Builder
    {
        return parent::query()->orderBy('IDAgua', 'desc');
    }

    // Método para obter todas as bacias
    public static function getAnaliseMicrobiologicaSelectOptions()
    {
        return static::orderBy('Descricao')->pluck('*', 'IDMaterial')->toArray();
    }

    public function piscicultura()
    {
        return $this->belongsTo(Piscicultura::class, 'IDPsicultura', 'IDPsicultura');
    }
}
