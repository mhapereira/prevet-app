<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservatorio extends Model
{
    use HasFactory;

     // Especifica o nome da tabela personalizada
     protected $table = 'reservatorios';

     // Especifica a chave primária personalizada, se necessário
     protected $primaryKey = 'id';
 
     protected $fillable = [
         'reservatorio',
         'id_bacia',
         'created_at',
         'updated_at'
     ];

    // Relacionamento com a Bacia
    public function bacia()
    {
        return $this->belongsTo(Bacia::class, 'id_bacia', 'id');
    }

    public static function getReservatorioSelectOptions()
    {
        return static::orderBy('reservatorio')->pluck('reservatorio', 'id')->toArray();
    }
}
