<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class justificarFalta extends Model
{
    use HasFactory;
    protected $fillable=([
                'data',
                'valor',
                'estudante',
                'presenca'
    ]);
}
