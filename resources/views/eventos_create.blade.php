@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Evento</h2>
        </div>
        <div>
            <a href="{{route('eventos.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('eventos.store')}}" method="POST" id="crearEventoForm">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_evento" class="form-control" placeholder="Nombre del evento">
                </div>
                <div class="form-group">
                    <strong>Día del evento:</strong>
                    <input type="date" name="dia_evento" class="form-control" placeholder="Selecciona el día del evento">
                </div>
                <div class="form-group">
                    <strong>Cotización:</strong>
                    <input type="number" id="cotizacion" name="precio_evento" class="form-control" placeholder="Cotización del evento" oninput="calcularResto()">
                </div>
                <div class="form-group">
                    <strong>Anticipo:</strong>
                    <input type="number" id="anticipo" name="anticipo" class="form-control" placeholder="Anticipo del evento" oninput="calcularResto()">
                </div>
                <div class="form-group">
                    <strong>Descuento:</strong>
                    <input type="number" id="descuento" name="descuento" class="form-control" placeholder="Descuento del evento" oninput="calcularResto()">
                </div>
                <div class="form-group">
                    <strong>Resto por pagar:</strong>
                    <input type="number" id="resto" name="resto" class="form-control" placeholder="Resto del evento" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion_evento" placeholder="Descripción..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <strong>Estatus del evento:</strong>
                <select name="estatus" class="form-control">
                    <option value="Concluido">Concluido</option>
                    <option value="En Curso">En Curso</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control" required>
                    <option value="">Selecciona un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre_cliente }} - {{ $cliente->telefono_cliente }} - {{ $cliente->descripcion_cliente }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Agendar</button>
            </div>
        </div>
    </form>
</div>
<script>
    function calcularResto() {
        var cotizacion = parseFloat(document.getElementById('cotizacion').value);
        var anticipo = parseFloat(document.getElementById('anticipo').value);
        var descuento = parseFloat(document.getElementById('descuento').value);
        
        if (isNaN(cotizacion)) {
            cotizacion = 0;
        }
        if (isNaN(anticipo)) {
            anticipo = 0;
        }
        if (isNaN(descuento)) {
            descuento = 0;
        }

        var resto = cotizacion - anticipo - descuento;

        document.getElementById('resto').value = resto.toFixed(2);
    }
</script>
@endsection
