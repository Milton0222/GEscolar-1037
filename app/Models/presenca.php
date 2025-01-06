<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presenca extends Model
{
    use HasFactory;

    protected $fillable=([
            'data',
            'estudante',
            'turma',
            'tipo'
    ]);
}
