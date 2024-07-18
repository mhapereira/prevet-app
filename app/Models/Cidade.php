<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'cidade';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'ID';

    protected $fillable = [
        'Nome_Cidade',
        'ID_Estado',
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'ID_Estado', 'ID');
    }

}
