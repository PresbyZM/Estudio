<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosCliController extends Controller
{
    public function index(Request $request)
    {
       
        $categoria = $request->input('categoria');

        $servicios = $categoria ? 
                     Servicio::where('categoria', $categoria)->get() :
                     Servicio::all();

        return view('clientes.servicioscli_index', compact('servicios', 'categoria'));
    }
}
