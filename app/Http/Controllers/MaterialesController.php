<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $materiales = Material::latest()->paginate(3);
        return view('materiales_index', ['materiales' => $materiales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('materiales_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            

        ]);
        Material::create($request->all());
        return redirect()->route('materiales.index')->with('success', 'Nuevo material creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(MAterial $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material): View
    {
        return view('materiales_edit', ['material' => $material]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material): RedirectResponse
    {
        $request->validate([

        

        ]);

        $cantidadAgregar = $request->input('cantidad_agregar');
        $cantidadActual = $material->cantidad_actual;
        $cantidadMaxima = $material->cantidad_max;
        
        //dd($request->all());
        $material->update([
            'nombre_material' => $request->input('nombre_material'),
            'descripcion_material' => $request->input('descripcion_material'),
            'cantidad_actual' => $cantidadActual + $cantidadAgregar,
            'cantidad_max' => $request->input('cantidad_max'),
        ]);
        return redirect()->route('materiales.index')->with('success', 'Material actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material): RedirectResponse
    {
        $material->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado exitosamente');
    }
}
