<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha_treino extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
    ];
}
