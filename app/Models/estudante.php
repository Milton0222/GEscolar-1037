<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudante extends Model
{
    use HasFactory;
    protected $fillable=(['nome',
                            'bi',
                            'sexo',
                            'estado_civil',
                            'email',
                            'foto',
                            'idade',
                            'nomemae',
                            'nomepai',
                            'datanascimento',
                            'contacto',
                            'naturalidade','morada']);
}
