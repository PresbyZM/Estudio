<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = $request->input('query');

        $clientes = Cliente::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('nombre_cliente', 'like', "%{$query}%")
                         ->orWhere('apellidop_cliente', 'like', "%{$query}%")
                         ->orWhere('apellidom_cliente', 'like', "%{$query}%");
        })->latest()->paginate();
    
        return view('clientes_index', ['clientes' => $clientes, 'query' => $query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('clientes_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'nombre_cliente' => 'required|string|max:30',
            'apellidom_cliente' => 'required|string|max:30',
            'apellidop_cliente' => 'required|string|max:30',
            'telefono_cliente' => 'required|string|max:15',
            'descripcion_cliente' => 'nullable|string|max:300',

        ]);
        $cliente = Cliente::create($request->all());
        
        return redirect()->route('clientes.index')->with('success', 'Nuevo cliente registrado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente): View
    {
        return view('clientes_edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
        $request->validate([

            'nombre_cliente' => 'required|string|max:30',
            'apellidom_cliente' => 'required|string|max:30',
            'apellidop_cliente' => 'required|string|max:30',
            'telefono_cliente' => 'required|string|max:15',
            'descripcion_cliente' => 'nullable|string|max:300',

        ]);
        //dd($request->all());
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente');
    }
}
