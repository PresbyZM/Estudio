@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <a href="{{ route('ingresos.exportPdf', ['month' => $month, 'year' => $year]) }}" class="btn btn-primary">Exportar PDF</a>
        
        <div>
            <h2>Ingresos Mensuales</h2>
        </div>
        <div>
            <form method="GET" action="{{ route('ingresos.index') }}">
                <div class="form-group">
                    <label for="month">Mes:</label>
                    <select name="month" id="month" class="form-control">
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Año:</label>
                    <input type="number" name="year" id="year" class="form-control" value="{{ $year }}">
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
        </div>
    </div>

    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Ingresos para {{ date('F', mktime(0, 0, 0, $month, 1)) }} {{ $year }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Total Anticipos:</strong> ${{ number_format($totalAnticipos, 2) }}</p>
                <p><strong>Total Descuentos:</strong> ${{ number_format($totalDescuentos, 2) }}</p>
                <p><strong>Total Ingresos:</strong> ${{ number_format($totalIngresos, 2) }}</p>
            </div>
        </div>
    </div>

    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Detalles de Ingresos</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Precio Evento</th>
                                <th>Anticipo</th>
                                <th>Descuento</th>
                                <th>Total Ingresos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eventos as $evento)
                            <tr>
                                <td>{{ $evento->nombre_evento }}</td>
                                <td>${{ number_format($evento->precio_evento, 2) }}</td>
                                <td>${{ number_format($evento->anticipo, 2) }}</td>
                                <td>${{ number_format($evento->descuento, 2) }}</td>
                                <td>${{ number_format($evento->anticipo + $evento->descuento, 2) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"><strong>Total General</strong></td>
                                <td>${{ number_format($totalAnticipos, 2) }}</td>
                                <td>${{ number_format($totalDescuentos, 2) }}</td>
                                <td>${{ number_format($totalIngresos, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
