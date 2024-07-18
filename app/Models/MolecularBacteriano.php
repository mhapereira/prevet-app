<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MolecularBacteriano extends Model
{
    use HasFactory;

         // Especifica o nome da tabela personalizada
         protected $table = 'molecular_bacteriana';

         // Especifica a chave primária personalizada, se necessário
         protected $primaryKey = 'IDBacteriana';
     
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
             return parent::query()->orderBy('IDBacteriana', 'desc');
         }
    
         // Método para obter todas as bacias
        public static function getMolecularBacterianoSelectOptions()
        {
            return static::orderBy('IDBacteriana')->pluck('*', 'IDBacteriana')->toArray();
        }
    
        public function piscicultura()
        {
            return $this->belongsTo(Piscicultura::class, 'IDPsicultura', 'IDPsicultura');
        }
    
        public function resultadoBacteriano()
        {
            return $this->belongsTo(ResultadoBacteriano::class, 'IDBacteriana', 'Bact_ID');
        }
}
