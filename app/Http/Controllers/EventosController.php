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
    public function index(): View
    {
        
        $eventos = Evento::with('cliente')->latest()->paginate(3);
        return view('eventos_index', ['eventos' => $eventos]);
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

            

        ]);
        Evento::create($request->all());
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
        //dd($request->all());
        $evento->update($request->all());
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
}
