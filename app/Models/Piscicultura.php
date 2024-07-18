<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piscicultura extends Model
{
    use HasFactory;

    // Especifica o nome da tabela personalizada
    protected $table = 'psicultura';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'IDPsicultura';

    protected $fillable = [
        'Nome',
        'reservatorio',//id
        'Endereco',
        'Telefone',
        'Email',
        'Cidade_ID',//id
        'IDUsuario',//id
        'cnpj',
        'Aceito',
        'IDJose',//id
        'created_at',
        'updated_at'
    ];

    public function reservatorio()
    {
        return $this->belongsTo(Reservatorio::class, 'reservatorio', 'id');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'Cidade_ID', 'ID');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'IDUsuario', 'IDUsuario');
    }

    public static function getPisciculturaSelectOptions()
    {
        return static::orderBy('Nome')->pluck('Nome', 'IDPsicultura')->toArray();
    }
}
