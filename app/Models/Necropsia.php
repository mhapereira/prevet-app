<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Necropsia extends Model
{
    use HasFactory;

    // protected static function booted()
    // {
    //     static::creating(function ($necropsia) {
    //         // dd($necropsia->id_necropsia);

    //         $dados_necropsia = [];

    //         foreach ($necropsia->id_necropsia as $key => $value) {
    //             // dd($value['Incidencia']);
    //             if ($value['Incidencia']) {
    //                 $dados_necropsia[] = [ 
    //                     'id' =>  $value['id_necropsia'], 
    //                     'sinal' => $value['nome'],
    //                     'incidencia' => $value['Incidencia']
    //                 ];
    //             }
    //         }
    //         // Lógica para inserir na tabela `tb_da`
    //         // DB::table('necropsias')->insert([
    //         //     'id_material' => $necropsia->id_material,
    //         //     'id_necropsia' => json_encode($dados_necropsia),
    //         // ]);
    //         $texto = implode("\n", array_map(function($item) {
    //             return json_encode($item);
    //         }, $dados_necropsia));

    //         $necropsia->id_necropsia = $texto;
    //     });
    // }
    // Especifica o nome da tabela personalizada
    protected $table = 'necropsias';

    // Especifica a chave primária personalizada, se necessário
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_material',
        'id_necropsia',
        'incidencia',
        'created_at',
        'updated_at'
    ];

    protected function casts(): array
    {
        return [
            'id_necropsia' => 'array',
        ];
    }

    public function amostra()
    {
        return $this->belongsTo(RegistroAmostra::class, 'id_material');
    }

    public function sinalClinico()
    {
        return $this->belongsTo(SinailClinico::class, 'id_necropsia');
    }

    public function sinal()
    {
        return $this->belongsToMany(SinailClinico::class, 'id_necropsia');
    }

   
}
