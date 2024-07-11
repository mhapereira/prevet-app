<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fragmento extends Model
{
    use HasFactory;

     // Especifica o nome da tabela personalizada
     protected $table = 'fraguimentos';

     // Especifica a chave primária personalizada, se necessário
     protected $primaryKey = 'IDFraguimentos';
 
     protected $fillable = [
         'Descricao',
         'created_at',
         'updated_at'
     ];

     // Método para obter todas as bacias
    public static function getFragmentoSelectOptions()
    {
        return static::orderBy('Descricao')->pluck('Descricao', 'IDFraguimentos')->toArray();
    }
}
