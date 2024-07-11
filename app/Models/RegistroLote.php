<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroLote extends Model
{
    use HasFactory;

        // Especifica o nome da tabela personalizada
        protected $table = 'ultimo_laudo';

        // Especifica a chave primária personalizada, se necessário
        protected $primaryKey = 'ID_ultimo';
    
        protected $fillable = [
            'idultimo_laudo',
            'created_at',
            'updated_at'
        ];
    
        
        public static function query(): Builder
        {
            return parent::query()->orderBy('ID_ultimo', 'desc');
        }
}
