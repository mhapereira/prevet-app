<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antibiotico extends Model
{
    use HasFactory;

     // Especifica o nome da tabela personalizada
     protected $table = 'antibioticos';

     // Especifica a chave primária personalizada, se necessário
     protected $primaryKey = 'IDAntibioticos';
 
     protected $fillable = [
         'Descricao',
         'Medida',
         'created_at',
         'updated_at'
     ];

     // Método para obter todas as bacias
    public static function getAntibioticoSelectOptions()
    {
        return static::orderBy('Descricao')->pluck('Descricao', 'IDAntibioticos')->toArray();
    }
}
