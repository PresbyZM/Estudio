<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Peticion;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PeticionCliController extends Controller
{
    public function index()
    {
        $usuarioId = auth('clientes')->user()->id;

        $peticiones = Peticion::where('usuario_cliente_id', $usuarioId)->get();

        return view('clientes.peticiones_index', compact('peticiones'));
    }

    public function create(Request $request): View
    {
        $servicios = Servicio::all();
        $fechaSeleccionada = $request->input('dia_evento_peticion');
        return view('clientes.peticiones_create', compact('servicios', 'fechaSeleccionada'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre_evento_peticion' => 'required|string|max:30',
            'dia_evento_peticion' => 'required|date|after_or_equal:today',
            'descripcion_evento_peticion' => 'required|string|max:300',
            'servicio_id' => 'required|exists:servicios,id',
        ]);

        $data = $request->all();
        $data['usuario_cliente_id'] = auth('clientes')->user()->id;

        Peticion::create($data);
        return redirect()->route('peticiones.index')->with('success', 'solicitud evento creada exitosamente');

    }

    public function obtenerPrecio($id)
    {
        $servicio = Servicio::findOrFail($id);
        return response()->json(['precio' => $servicio->precio_servicio]);
    }

    public function descargarTicket($id)
    {
        $peticion = Peticion::findOrFail($id);

        // Generar la vista en HTML para el PDF
        $html = view('clientes.ticket_pdf', compact('peticion'))->render();

        // Crear instancia de Dompdf y cargar el HTML
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Retornar el PDF generado
        return $dompdf->stream('ticket_'.$peticion->id.'.pdf');
    }

    public function mostrarPago($id)
    {
        $peticion = Peticion::findOrFail($id);
        return view('clientes.pagar', compact('peticion'));
    }


}
