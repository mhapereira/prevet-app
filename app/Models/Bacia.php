<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bacia extends Model
{
    use HasFactory;

     // Especifica o nome da tabela personalizada
     protected $table = 'bacias';

     // Especifica a chave primária personalizada, se necessário
     protected $primaryKey = 'id';
 
     protected $fillable = [
         'nome',
         'created_at',
         'updated_at'
     ];

     // Método para obter todas as bacias
    public static function getBaciasSelectOptions()
    {
        return static::orderBy('nome')->pluck('nome', 'id')->toArray();
    }
}
