<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'activa'
    ];
}// ESTOS CAMPOS SI PUEDEN GUARDARSE DESDE CODIGO
//esto fue para guardar una planta y agregar precio y stock