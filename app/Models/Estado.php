<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'estado';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'ID';

    protected $fillable = [
        'Nome_estado',
        'UF',
    ];
}
