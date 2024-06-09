@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">EVENTOS</h2>
        </div>
        <div>
            <a href="{{route('eventos.create')}}" class="btn btn-primary">Crear evento</a>
            <a href="{{route('calendario')}}" class="btn btn-success">Ver calendario</a>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-4">
            <strong>{{Session::get('success')}}<br>
        </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Evento</th>
                <th>Fecha</th>
                <th>Cotizacion</th>
                <th>Anticipo dado</th>
                <th>Resta pagar</th>
                <th>Descripcion del evento</th>
                <th>Estatus del evento</th>
                <th>Cliente</th>
                <th>Teléfono del Cliente</th>
                <th>Descripcion del cliente</th>
                <th>Acción</th>
            </tr>
            @foreach ($eventos as $evento)
            <tr>
                <td class="fw-bold">{{$evento->nombre_evento}}</td>
                <td>{{$evento->dia_evento}}</td>
                <td>{{$evento->precio_evento}}</td>
                <td>{{$evento->anticipo}}</td>
                <td>{{$evento->resto}}</td>
                <td>{{$evento->descripcion_evento}}</td>
                <td>{{$evento->estatus}}</td>
                <td>{{ $evento->cliente ? $evento->cliente->nombre_cliente : 'N/A' }}</td>
                <td>{{ $evento->cliente ? $evento->cliente->telefono_cliente : 'N/A' }}</td>
                <td>{{ $evento->cliente ? $evento->cliente->descripcion_cliente : 'N/A' }}</td>
                <td>
                    <a href="{{ route('eventos.edit', $evento) }}" class="btn btn-warning">Editar</a>

                    <form action="{{route('eventos.destroy', $evento)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$eventos->links()}}
    </div>
</div>
@endsection
