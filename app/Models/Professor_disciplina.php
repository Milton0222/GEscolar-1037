<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor_disciplina extends Model
{
    use HasFactory;
    protected $fillable=([
            'professor',
            'disciplina',
       
    ]);
}
