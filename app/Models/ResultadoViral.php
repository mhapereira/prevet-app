<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoViral extends Model
{
    use HasFactory;

         // Especifica o nome da tabela personalizada
         protected $table = 'laudo_viral';

         // Especifica a chave primária personalizada, se necessário
         protected $primaryKey = 'ID_laudo_Viral';
     
         protected $fillable = [
            'Viral_ID',
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
            'created_at',
            'updated_at'
         ];
    
         // Método para obter todas as bacias
        public static function getBaciasSelectOptions()
        {
            return static::orderBy('nome')->pluck('nome', 'id')->toArray();
        }
    
        public function piscicultura()
        {
            return $this->belongsTo(Piscicultura::class, 'IDPsicultura', 'IDPsicultura');
        }
}
