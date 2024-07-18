<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Antibiograma extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'antibiograma';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'ID';

    protected $fillable = [
        'IDAntibioticos',
        'ID_Molecular',
        'Resultados',
        'Estatus',
        'Amostra',
        'created_at',
        'updated_at'
    ];

    public function analiseMicrobiologica(): BelongsTo
    {
        return $this->belongsTo(AnaliseMicrobiologica::class, 'Amostra', 'IDPeixe');
    }

    public function antibiotico()
    {
        return $this->belongsTo(Antibiotico::class, 'IDAntibioticos', 'IDAntibioticos');
    }

    // protected static function booted(): void
    // {

    //     static::saving(function ($model) {

    //         dd($model);

    //         $lote = RegistroAmostra::where('IDMaterial',$model->IDMaterial)->pluck('lote')->first();
    //         $sigla_meiodecultura = MeioDeCultura::where('IDMeioCultura',$model->IDMeioCultura)->pluck('apelido')->first();

    //         $IDPeixe = $lote . $model->IDPeixe . $sigla_meiodecultura;

    //         $model->Amostra = $IDPeixe;

    //         return true;
    //     });
    // }
}
