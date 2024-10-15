@extends('layouts.base')


@section('content')
<br>
<br>
<br>
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Servicios</h2>
        </div>
        <div>
            <a href="{{ route('servicios.create') }}"" class="btn btn-primary">Crear servicio</a>
        </div>
    </div>


    <div class="col-12 mt-4">
        <form action="{{ route('servicios.index') }}" method="GET" class="d-flex">
            <select name="categoria" class="form-select me-2" onchange="this.form.submit()">
                <option value="">-- Filtrar por Categoría --</option>
                <option value="Paquetes" {{ request('categoria') == 'Paquetes' ? 'selected' : '' }}>Paquetes</option>
                <option value="Cuadros" {{ request('categoria') == 'Cuadros' ? 'selected' : '' }}>Cuadros</option>
                <option value="Filmacion" {{ request('categoria') == 'Filmacion' ? 'selected' : '' }}>Filmación</option>
                <option value="Fotografias" {{ request('categoria') == 'Fotografias' ? 'selected' : '' }}>Fotografías</option>
                <option value="Edicion" {{ request('categoria') == 'Edicion' ? 'selected' : '' }}>Edición</option>
                <option value="Otros" {{ request('categoria') == 'Otros' ? 'selected' : '' }}>Otros</option>
            </select>
            <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Quitar Filtro</a>
        </form>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text">
                <th>Servicio</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Imagen</th>
                <th>Acción</th>
            </tr>
            @foreach ($servicios as $servicio)
            <tr>
                <td class="fw-bold">{{$servicio->nombre_servicio}}</td>
                <td>{{$servicio->descripcion_servicio}}</td>
                <td>
                    {{$servicio->precio_servicio}}
                </td>
                <td>
                    {{$servicio->categoria}}
                </td>
                <td>
                    @if($servicio->imagen)
                        <img src="{{ asset('images/servicios/'.$servicio->imagen) }}" alt="{{$servicio->nombre_servicio}}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('servicios.edit', $servicio) }}"" class="btn btn-warning">Editar</a>

                    <form action="{{route('servicios.destroy', $servicio)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection