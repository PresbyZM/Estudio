<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class CanlendarioCliController extends Controller
{
    public function calendarioCliente()
    {
        $fechasEventos = Evento::pluck('dia_evento')->toArray();
        
        return view('clientes.calendario', compact('fechasEventos'));
    }
}
