<?php

namespace App\Models;

use Exception;
use Filament\Models\Contracts\HasName;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegistroAmostra extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::created(function (RegistroAmostra $registroAmostra) {
            $registroLote = RegistroLote::orderBy('created_at', 'desc')->first();

            $numero = $registroLote['idultimo_laudo'];

            // Separar os dois últimos caracteres
            $ultimos_dois = substr($numero, -2);

            // Pegar os três primeiros caracteres e adicionar 1
            $primeiros_tres = substr($numero, 0, 3);
            $incrementado = (int)$primeiros_tres + 1;

            // Formatar o valor incrementado para manter 3 dígitos
            $incrementado_formatado = str_pad($incrementado, 3, '0', STR_PAD_LEFT);

            // Concatenar o valor incrementado formatado com os dois últimos caracteres
            $resultado_final = $incrementado_formatado . $ultimos_dois;

            RegistroLote::create(['idultimo_laudo' => $resultado_final]);
            //////////////////////////////////////////////////////////////////////////////////////

            // dd($registroAmostra);

            // 1 Rim -      1 BHI
            // 4 Cérebro -  2 BHI Sangue
            // 6 Brânquias- 3 Meio F

            if (!isset($registroAmostra['IDMaterial']) || empty($registroAmostra['IDMaterial'])) {
                throw new Exception("O campo 'IDMaterial' está ausente ou vazio.");
            }

            $quantidade = $registroAmostra['Quantidade'];

            // Itera de 0 até quantidade - 1
            for ($key = 1; $key <= $quantidade; $key++) {
                AnaliseMicrobiologica::create([

                    'IDMaterial' => $registroAmostra['IDMaterial'],
                    'IDFraguimentos' => 1,
                    'IDMeioCultura' => 1,
                    'IDLaudo' => 2,
                    'IDPeixe' => $registroAmostra['lote'].$key.'A'
                
                ]);
                AnaliseMicrobiologica::create([
                    
                    'IDMaterial' => $registroAmostra['IDMaterial'],
                    'IDFraguimentos' => 4,
                    'IDMeioCultura' => 2,
                    'IDLaudo' => 2,
                    'IDPeixe' => $registroAmostra['lote'].$key.'B'
                    
                ]);
                AnaliseMicrobiologica::create([
                    
                    'IDMaterial' => $registroAmostra['IDMaterial'],
                    'IDFraguimentos' => 6,
                    'IDMeioCultura' => 3,
                    'IDLaudo' => 2,
                    'IDPeixe' => $registroAmostra['lote'].$key.'F'
                    
                ]);
            }

        });
    }

    // Especifica o nome da tabela personalizada
    protected $table = 'material';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'IDMaterial';

    protected $fillable = [
        'IDMaterial',
        'Descricao',
        'lote',
        'necropsia',
        'Quantidade',
        'Refrigeracao',
        'Especie',
        'IDPsicultura',
        'Data_coleta',
        'Estatus',
        'data_campo',
        'tank',
        'peso',
        'Conclusao',
        'data_conclusao',
        'arquivo',
        'created_at',
        'updated_at'
    ];
    

    protected function casts(): array
    {
        return [
            'necropsia' => 'array',
        ];
    }
    public static function query(): Builder
    {
        return parent::query()->orderBy('IDMaterial', 'desc');
    }
    
    public function piscicultura()
    {
        return $this->belongsTo(Piscicultura::class, 'IDPsicultura', 'IDPsicultura');
    }

    // public function amostra()
    // {
    //     return $this->belongsToMany(AnaliseMicrobiologica::class);
    // }

    public function amostra(): HasMany
    {
        return $this->hasMany(AnaliseMicrobiologica::class, 'IDMaterial', 'IDMaterial');
    }

    // Método para obter todos registros
    public static function getRegistroAmostraSelectOptions()
    {
        return static::orderBy('tank')->pluck('tank', 'IDMaterial')->toArray();
    }
}
