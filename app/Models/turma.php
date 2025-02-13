<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turma extends Model
{
    use HasFactory;
    protected $fillable=([
            'nome',
            'periodo',
            'quantidade',
            'classe',
            'curso',
            'sala'
    ]);
}
