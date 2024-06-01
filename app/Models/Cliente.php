<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_cliente','apellidop_cliente','apellidom_cliente','telefono_cliente','descripcion_cliente'];
}
