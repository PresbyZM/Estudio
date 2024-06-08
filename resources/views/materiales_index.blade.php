@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">INVENTARIO</h2>
        </div>
        <div>
            <a href="{{route('materiales.create')}}" class="btn btn-primary">AGREGAR MATERIAL</a>
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
                <th>Material</th>
                <th>Descripción</th>
                <th>Cantidad total</th>
                <th>Acción</th>
            </tr>
            @foreach ($materiales as $material)
            <tr>
                <td class="fw-bold">{{$material->nombre_material}}</td>
                <td>{{$material->descripcion_material}}</td>
                <td>{{$material->cantidad_actual}}</td>
                <td>
                    <a href="{{ route('materiales.edit', $material) }}" class="btn btn-warning">Agregar cantidad</a>

                    <form action="{{route('materiales.destroy', $material)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$materiales->links()}}
    </div>
</div>
@endsection