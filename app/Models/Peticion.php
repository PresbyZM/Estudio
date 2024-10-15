<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    use HasFactory;

    protected $table = 'peticiones';

    protected $fillable = ['nombre_evento_peticion','dia_evento_peticion','precio_evento_peticion','descuento_peticion','anticipo_peticion','resto_peticion','fecha_anticipo_peticion','fecha_resto_peticion','descripcion_evento_peticion','estatus_peticion', 'servicio_id', 'usuario_cliente_id'];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function usuarioCliente()
    {
        return $this->belongsTo(User_cli::class, 'usuario_cliente_id');
    }
}
