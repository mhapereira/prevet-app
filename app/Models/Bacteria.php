<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bacteria extends Model
{
    use HasFactory;

        // Especifica o nome da tabela personalizada
        protected $table = 'bacteria';

        // Especifica a chave primária personalizada, se necessário
        protected $primaryKey = 'id';
    
        protected $fillable = [
            'name',
            'created_at',
            'updated_at'
        ];
    
        // Método para obter todas as bacias
        public static function getBacteriaSelectOptions()
        {
            return static::orderBy('name')->pluck('name', 'name')->toArray();
        }
}
