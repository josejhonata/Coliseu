<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exercicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipamento',
        'descricao',
        'serie',
        'repeticao',
        'descanso',
        'observacao',
        'tipo_de_treino',
    ];
}
