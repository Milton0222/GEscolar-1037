<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pauta_estudante extends Model
{
    use HasFactory;

    protected $fillable=[
        'avaliacao1',
        'avaliacao2',
        'avaliacao3',
        'media',
        'falta',
        'classificacao',
        'disciplina',
        'aluno',
        'pauta'];
}
