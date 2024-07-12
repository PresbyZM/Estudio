@extends('layouts.base')
<br>
<br>
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/formularios/ingresos.css') }}">
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-6">
                <h2 style="color: white;">Ingresos Mensuales</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('ingresos.exportPdf', ['month' => $month, 'year' => $year]) }}" class="btn btn-primary" onclick="showLoader()">
                    <i class="fas fa-file-pdf"></i> Exportar PDF
                </a>
            </div>
        </div>

        <form method="GET" action="{{ route('ingresos.index') }}" class="mb-4 row gx-3 align-items-end">
            <div class="col-auto">
                <label for="month" class="sr-only">Mes:</label>
                <select name="month" id="month" class="form-control">
                    @foreach (range(1, 12) as $m)
                        <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create(null, $m, 1)->locale('es')->isoFormat('MMMM') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <label for="year" class="sr-only">Año:</label>
                <input type="number" name="year" id="year" class="form-control" value="{{ $year }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Filtrar
                </button>
            </div>
        </form>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header">
                        <h3 class="card-title">Ingresos para {{ \Carbon\Carbon::create(null, $month, 1)->locale('es')->isoFormat('MMMM') }} {{ $year }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Total en anticipos:</strong> ${{ number_format($totalAnticipos, 2) }}</p>
                        <p><strong>Total en liquidaciones:</strong> ${{ number_format($totalDescuentos, 2) }}</p>
                        <p><strong>Total de ingresos:</strong> ${{ number_format($totalIngresos, 2) }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header">
                        <h3 class="card-title">Gráfica de Ingresos</h3>
                    </div>
                    <div class="card-body chart-container">
                        <canvas id="incomeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header">
                        <h3 class="card-title">Detalles de Ingresos</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-blue">
                                    <tr>
                                        <th>Evento</th>
                                        <th>Cotizacion del evento</th>
                                        <th>Anticipo</th>
                                        <th>Total liquidado</th>
                                        <th>Total ingresos</th>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('incomeChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Anticipos', 'Liquidaciones', 'Ingresos Totales'],
                    datasets: [{
                        label: 'Ingresos',
                        data: [{{ $totalAnticipos }}, {{ $totalDescuentos }}, {{ $totalIngresos }}],
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                        borderColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                        borderWidth: 1,
                        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                        hoverBorderColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    }]
                },
                options: {
                    animation: {
                        duration: 2000
                    },
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
