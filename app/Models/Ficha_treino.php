<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha_treino extends Model
{
    use HasFactory;

        protected $fillable = [
        'titulo',
        'data_inicio',
        'data_final',
        'user_name',
        'situacao',
        'tipo_de_treino',
        'user_professor',
    ];

    public function equipamentos(){
        return $this->hasMany(equipamento::class);
    }
}
