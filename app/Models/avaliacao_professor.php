<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avaliacao_professor extends Model
{
    use HasFactory;

    protected $fillable=[
        'avaliacao1','avaliacao2','avaliacao3','avaliacao4',
        'resultado','avaliador','professor'
    ];
}
