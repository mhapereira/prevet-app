<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinailClinico extends Model
{
    use HasFactory;
    
     // Especifica o nome da tabela personalizada
     protected $table = 'dados_necropsia';

     // Especifica a chave primária personalizada, se necessário
     protected $primaryKey = 'IDNecropsia';
 
     protected $fillable = [
         'DescricaoNecropsia',
         'created_at',
         'updated_at'
     ];

     // Método para obter todas as bacias
    public static function getSinailClinicoSelectOptions()
    {
        return static::orderBy('DescricaoNecropsia')->pluck('DescricaoNecropsia', 'IDNecropsia')->toArray();
    }
}
