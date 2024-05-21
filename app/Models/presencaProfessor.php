<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presencaProfessor extends Model
{
    use HasFactory;
    protected $fillable=([
        'data_entrada',
        'hora_entrada',
        'professor',
        'obs'
    ]);
}
