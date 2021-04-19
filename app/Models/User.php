<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'usuario'
    ];
}
