<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PisciculturaDoUsuario extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'pis_usuario';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'IDpis_usuario';

    protected $fillable = [
        'IDUsuario',
        'IDPsicultura',
        'created_at',
        'updated_at'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'IDUsuario', 'IDUsuario');
    }

    public function piscicultura()
    {
        return $this->belongsTo(Piscicultura::class, 'IDPsicultura', 'IDPsicultura');
    }
}
