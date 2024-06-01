<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clientes = Cliente::latest()->paginate(3);
        return view('clientes_index', ['clientes' => $clientes]);
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

            'nombre_cliente' => 'required|string|max:255',
            'apellidom_cliente' => 'required|string|max:255',
            'apellidop_cliente' => 'required|string|max:255',
            'telefono_cliente' => 'required|string|max:255',
            'descripcion_cliente' => 'nullable|string',

        ]);
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Nuevo cliente frecuente creado exitosamente');
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

            'nombre_cliente' => 'required|string|max:255',
            'apellidom_cliente' => 'required|string|max:255',
            'apellidop_cliente' => 'required|string|max:255',
            'telefono_cliente' => 'required|string|max:255',
            'descripcion_cliente' => 'nullable|string',

        ]);
        //dd($request->all());
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Nuevo cliente frecuente actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente frecuente eliminado exitosamente');
    }
}
