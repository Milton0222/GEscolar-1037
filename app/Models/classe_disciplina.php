<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classe_disciplina extends Model
{
    use HasFactory;
    protected $fillable=([
        'classe',
        'disciplina'
    ]);
}
