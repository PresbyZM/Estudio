<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $fechaEvento = $request->input('fecha_evento');

        $eventos = Evento::when($fechaEvento, function ($query) use ($fechaEvento) {
            $query->whereDate('dia_evento', $fechaEvento);
        })->latest()->paginate(15);

        return view('eventos_index', compact('eventos', 'fechaEvento'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $clientes = Cliente::all();
        return view('eventos_create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre_evento' => 'required|string|max:30',
            'dia_evento' => 'required|date|after_or_equal:today',
            'precio_evento' => 'required|numeric',
            'descuento' => 'nullable|numeric',
            'anticipo' => 'required|numeric',
            'resto' => 'required|numeric',
            'descripcion_evento' => 'required|string|max:300',
            'estatus' => 'required|string|max:50',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $data = $request->all();

        if (!empty($data['anticipo'])) {
            $data['fecha_anticipo'] = now();
        }

        if (!empty($data['descuento'])) {
            $data['fecha_resto'] = now();
        }

        Evento::create($data);
        return redirect()->route('eventos.index')->with('success', 'Nuevo evento creado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(Evento $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento): View
    {
        $clientes = Cliente::all();
        return view('eventos_edit', ['evento' => $evento], compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento): RedirectResponse
    {
        $request->validate([
            
        ]);

        $data = $request->all();

        if (!empty($data['anticipo'])) {
            $data['fecha_anticipo'] = now();
        }

        if (!empty($data['descuento'])) {
            $data['fecha_resto'] = now();
        }

        $evento->update($data);
        return redirect()->route('eventos.index')->with('success', 'Evento actualizado exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento): RedirectResponse
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado exitosamente');
    }

    public function eventos_calendario(): View
    {
        $eventos = Evento::all();
    
        $events = $eventos->map(function ($evento) {
            return [
                'title' => $evento->nombre_evento,
                'start' => $evento->dia_evento, 
                'description' => $evento->descripcion_evento,
                'client_name' => $evento->cliente ? $evento->cliente->nombre_cliente : 'N/A',
                'client_phone' => $evento->cliente ? $evento->cliente->telefono_cliente : 'N/A',
                'price' => $evento->precio_evento,
                'anticipo' => $evento->anticipo,
                'resto' => $evento->resto,
            ];
        });
    
        
        return view('eventos_calendario', ['events' => $events]);
    }
}
