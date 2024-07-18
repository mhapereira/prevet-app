<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MolecularViral extends Model
{
    use HasFactory;

     // Especifica o nome da tabela personalizada
     protected $table = 'molecular_viral';

     // Especifica a chave primária personalizada, se necessário
     protected $primaryKey = 'IDViral';
 
     protected $fillable = [
        'IDPsicultura',
        'qtd_amostra',
        'obs',
        'estatus',
        'data_coleta',
        'data_retirada',
        'data_chegada',
        'ID_amostra',
        'novo',
        'data_conclusao',
        'created_at',
        'updated_at'
     ];
     
     public static function query(): Builder
     {
         return parent::query()->orderBy('IDViral', 'desc');
     }

     // Método para obter todas as bacias
    public static function getMolecularViralSelectOptions()
    {
        return static::orderBy('IDViral')->pluck('*', 'IDViral')->toArray();
    }

    public function piscicultura()
    {
        return $this->belongsTo(Piscicultura::class, 'IDPsicultura', 'IDPsicultura');
    }

    public function resultadoViral()
    {
        return $this->belongsTo(ResultadoViral::class, 'IDViral', 'Viral_ID');
    }
}
