<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Evento;
use Dompdf\Dompdf;


class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $month = $request->get('month', Carbon::now()->month);
        $year = $request->get('year', Carbon::now()->year);

        $eventos = Evento::whereYear('fecha_anticipo', $year)
                         ->whereMonth('fecha_anticipo', $month)
                         ->get();

        $totalAnticipos = $eventos->sum('anticipo');
        $totalDescuentos = $eventos->sum('descuento');
        $totalIngresos = $totalAnticipos + $totalDescuentos;

        return view('ingresos_mostrar', compact('eventos', 'totalAnticipos', 'totalDescuentos', 'totalIngresos', 'month', 'year'));
    }

    public function exportPdf(Request $request)
    {
        $month = $request->get('month', Carbon::now()->month);
        $year = $request->get('year', Carbon::now()->year);

        $eventos = Evento::whereYear('fecha_anticipo', $year)
                         ->whereMonth('fecha_anticipo', $month)
                         ->get();

        $totalAnticipos = $eventos->sum('anticipo');
        $totalDescuentos = $eventos->sum('descuento');
        $totalIngresos = $totalAnticipos + $totalDescuentos;

        $html = view('ingresos_informe', compact('eventos', 'totalAnticipos', 'totalDescuentos', 'totalIngresos', 'month', 'year'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
        return $dompdf->stream('reporte_ingresos.pdf');
    }
    
}
