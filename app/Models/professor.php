<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    use HasFactory;
    protected $fillable=([
        'nome',
        'bi',
            'sexo',
            'datanascimento',
            'grauacademico',
            'municipio',
            'morada',
            'contacto',
            'email'
    ]);
}
