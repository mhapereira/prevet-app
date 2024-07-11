<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeioDeCultura extends Model
{
    use HasFactory;

     // Especifica o nome da tabela personalizada
     protected $table = 'meio_cultura';

     // Especifica a chave primária personalizada, se necessário
     protected $primaryKey = 'IDMeioCultura';
 
     protected $fillable = [
         'Descricao',
         'apelido',
         'created_at',
         'updated_at'
     ];

     public static function getMeioDeCulturaSelectOptions()
     {
         return static::orderBy('Descricao')->pluck('Descricao', 'IDMeioCultura')->toArray();
     }
 
     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array<int, string>
      */
     protected $hidden = [
         //
     ];
}
