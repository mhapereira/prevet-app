<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $casts = [
        'IDPeixe' => 'string',
    ];

    // Método para obter todas as bacias
    public static function getAnaliseMicrobiologicaSelectOptions()
    {
        return static::orderBy('Descricao')->pluck('*', 'IDMaterial')->toArray();
    }

    public function peixe()
    {
        return $this->IDPeixe;
    }

    public function fragmento()
    {
        return $this->belongsTo(Fragmento::class, 'IDFraguimentos', 'IDFraguimentos');
    }

    public function meiocultura()
    {
        return $this->belongsTo(MeioDeCultura::class, 'IDMeioCultura', 'IDMeioCultura');
    }

    public function amostra(): BelongsTo
    {
        return $this->belongsTo(RegistroAmostra::class, 'IDMaterial', 'IDMaterial');
    }

    protected static function booted(): void
    {

        static::saving(function ($model) {
            
            $lote = RegistroAmostra::where('IDMaterial',$model->IDMaterial)->pluck('lote')->first();
            $sigla_meiodecultura = MeioDeCultura::where('IDMeioCultura',$model->IDMeioCultura)->pluck('apelido')->first();

            $IDPeixe = $lote . $model->IDPeixe . $sigla_meiodecultura;

            $model->IDPeixe = $IDPeixe;

            return true;
        });
    }
}
