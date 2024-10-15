<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoria = $request->input('categoria');

        $servicios = Servicio::when($categoria, function($query, $categoria) {
            return $query->where('categoria', $categoria);
        })->latest()->get();

        return view('servicios_index', [
            'servicios' => $servicios,
            'categoriaSeleccionada' => $categoria
        ]);
        //$servicios = Servicio::latest()->get();
        //return view('servicios_index', ['servicios' => $servicios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre_servicio' => 'required|max:100',
            'descripcion_servicio' => 'required',
            'precio_servicio' => 'required|numeric',
            'categoria' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();
    
        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();  
            $request->imagen->move(public_path('images/servicios'), $imageName);
            $data['imagen'] = $imageName;
        }

        Servicio::create($data);
        return redirect()->route('servicios.index')->with('success', 'Nuevo servicio fue agregado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio): View
    {    
        return view('servicios_edit', ['servicio' => $servicio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio): RedirectResponse
    {
        $request->validate([
            'nombre_servicio' => 'required|max:100',
            'descripcion_servicio' => 'required',
            'precio_servicio' => 'required|numeric',
            'categoria' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {

            if ($servicio->imagen) {
                $oldImagePath = public_path('images/servicios/' . $servicio->imagen);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); 
                }
            }

            $imageName = time().'.'.$request->imagen->extension();  
            $request->imagen->move(public_path('images/servicios'), $imageName);
            $data['imagen'] = $imageName;
        }
        
        //dd($request->all());
        $servicio->update($data);
        return redirect()->route('servicios.index')->with('success', 'El servicio fue acualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio): RedirectResponse
    {
        if ($servicio->imagen) {
            $imagePath = public_path('images/servicios/' . $servicio->imagen);
            if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }

        $servicio->delete();
        return redirect()->route('servicios.index')->with('success', 'El servicio fue eliminado exitosamente');
    }
}
