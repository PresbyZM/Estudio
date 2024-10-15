<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_cli; // Modelo de usuarios_clientes
use App\Models\Peticion;
use App\Models\Evento;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PeticionController extends Controller
{
    public function index(): View
    {
        $peticiones = Peticion::with('usuarioCliente')->get(); 

        return view('peticiones_index', compact('peticiones'));
    }

    public function aprobarSolicitud(Peticion $peticion): View
    {
        // Obtener todos los usuarios de la tabla usuarios_clientes
        $usuariosClientes = User_cli::all();
        
        // Obtener el usuario_cliente asociado a la petición
        $usuarioActual = $peticion->usuarioCliente;

        // Cargar los datos de la petición
        $data = [
            'nombre_evento' => $peticion->nombre_evento_peticion ?? '',
            'dia_evento' => $peticion->dia_evento_peticion ?? '',
            'descripcion_evento' => $peticion->descripcion_evento_peticion ?? '',
            'cliente_id' => $usuarioActual->id ?? '', // ID del usuario asociado
            'precio_evento' => $peticion->precio_evento_peticion ?? 0.00,
            'anticipo' => $peticion->anticipo_peticion ?? 0.00,
            'resto' => $peticion->resto_peticion ?? 0.00,
            'estatus' => $peticion->estatus_peticion ?? 'En Curso',
            'peticion' => $peticion
        ];
        
        return view('eventos_create2', compact('usuariosClientes', 'usuarioActual'))->with($data);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre_evento' => 'required|string|max:30',
            'dia_evento' => 'required|date|after_or_equal:today',
            'precio_evento' => 'required|numeric',
            'anticipo' => 'required|numeric|min:1',
            'resto' => 'required|numeric',
            'descripcion_evento' => 'required|string|max:300',
            'estatus' => 'required|string|max:50',
            'cliente_id' => 'required|exists:usuarios_clientes,id',
            'peticion_id' => 'required|exists:peticiones,id', // Asegúrate de que el ID de la petición sea válido
        ]);
    
        $data = $request->all();
        
        // Actualiza el estatus_peticion de la petición asociada a "aceptado"
        $peticion = Peticion::find($data['peticion_id']);
        if ($peticion) {
            $peticion->estatus_peticion = 'Aceptado';
            $peticion->anticipo_peticion = $data['anticipo'];
            $peticion->resto_peticion = $data['resto'];
            $peticion->save();
        }
    
        // Opcionalmente establecer la fecha del anticipo si corresponde
        if (!empty($data['anticipo'])) {
            $data['fecha_anticipo'] = now();
        }
    
        // Crea el evento
        Evento::create($data);
    
        return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente y petición aceptada.');
    }

    public function eliminarSolicitud(Peticion $peticion): RedirectResponse
    {
        // Eliminar la petición
        $peticion->delete();

        return redirect()->route('peticiones.index.empleado')->with('success', 'Solicitud eliminada correctamente.');
    }

    public function rechazar(Request $request, $id)
    {
        $peticion = Peticion::findOrFail($id);
        $peticion->estatus_peticion = 'Rechazado';
        $peticion->save();

        return redirect()->back()->with('success', 'La solicitud ha sido rechazada.');
    }


    
}
