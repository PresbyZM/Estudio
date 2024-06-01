@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear cliente frecuente</h2>
        </div>
        <div>
            <a href="{{route('clientes.index')}}" class="btn btn-primary">Volver</a>
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

    <form action="{{route('clientes.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_cliente" class="form-control" placeholder="Tarea" >
                </div>
                <div class="form-group">
                    <strong>Apellido materno:</strong>
                    <input type="text" name="apellidom_cliente" class="form-control" placeholder="Apellido materno" >
                </div>
                <div class="form-group">
                    <strong>Apellido paterno:</strong>
                    <input type="text" name="apellidop_cliente" class="form-control" placeholder="Apellido paterno" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion_cliente" placeholder="Descripción..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <strong>Telefono:</strong>
                <input type="text" name="telefono_cliente" class="form-control" placeholder="Telefono" >
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection