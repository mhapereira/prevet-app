<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnaliseMicrobiologica extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'material_fraguimentos';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'IDPeixe';

    protected $fillable = [
        'IDMaterial',
        'IDFraguimentos',
        'IDMeioCultura',
        'lote',
        'resultado',
        'estatus',
        'morfologia',
        'IDLaudo',
        'IDPeixe',
        'obs',
        'verifica',
        'created_at',
        'updated_at'
    ];

    protected function casts(): array
    {
        return [
            'IDPeixe' => 'string',
        ];
    }

    // Método para obter todas as bacias
    public static function getAnaliseMicrobiologicaSelectOptions()
    {
        return static::orderBy('Descricao')->pluck('*', 'IDMaterial')->toArray();
    }

    public function fragmento()
    {
        return $this->belongsTo(Fragmento::class, 'IDFraguimentos', 'IDFraguimentos');
    }

    public function meiocultura()
    {
        return $this->belongsTo(MeioDeCultura::class, 'IDMeioCultura', 'IDMeioCultura');
    }
}
