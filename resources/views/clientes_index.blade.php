@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CLIENTES FRECUENTES</h2>
        </div>
        <div>
            <a href="{{route('clientes.create')}}" class="btn btn-primary">Crear cliente</a>
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
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Fecha de agregado</th>
                <th>telefono</th>
                <th>Acción</th>
            </tr>
            @foreach ($clientes as $cliente)
            <tr>
                <td class="fw-bold">{{$cliente->nombre_cliente}} {{$cliente->apellidom_cliente}} {{$cliente->apellidop_cliente}}</td>
                <td>{{$cliente->descripcion_cliente}}</td>
                <td>
                    31/03/23
                </td>
                <td>
                    <span class="badge bg-warning fs-6">{{$cliente->telefono_cliente}}</span>
                </td>
                <td>
                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>

                    <form action="{{route('clientes.destroy', $cliente)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$clientes->links()}}
    </div>
</div>
@endsection