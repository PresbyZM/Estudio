<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_servicio', 'descripcion_servicio', 'precio_servicio', 'categoria', 'imagen'];
}
