<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha_treino extends Model
{
    use HasFactory;

        protected $fillable = [
        'equipamento',
        'serie',
        'repeticao',
        'descricao',
        'user_name',
    ];

    public function equipamentos(){
        return $this->hasMany(equipamento::class);
    }
}
