@extends('layouts.base')

@section('content')
<br>
<br>
<br>
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar servicio</h2>
        </div>
        <div>
            <a href="{{route('servicios.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <strong>No pueder ser!!! </strong> Algo fue mal..<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('servicios.update', $servicio)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Servicio:</strong>
                    <input type="text" name="nombre_servicio" class="form-control" placeholder="Servicio" value="{{$servicio->nombre_servicio}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion_servicio" placeholder="Descripción...">{{$servicio->descripcion_servicio}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="number" name="precio_servicio" class="form-control" placeholder="Precio del servicio" value="{{$servicio->precio_servicio}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Categoria (inicial):</strong>
                    <select name="categoria" class="form-select" id="">
                        <option value="">-- Elige la categoria --</option>
                        <option value="Paquetes" @selected("Paquetes" == $servicio->categoria)>Paquetes</option>
                        <option value="Cuadros" @selected("Cuadros" == $servicio->categoria)>Cuadros</option>
                        <option value="Filmacion" @selected("Filmacion" == $servicio->categoria)>Filmacion</option>
                        <option value="Fotografias" @selected("Fotografias" == $servicio->categoria)>Fotografias</option>
                        <option value="Edicion" @selected("Edicion" == $servicio->categoria)>Edicion</option>
                        <option value="Otros" @selected("Otros" == $servicio->categoria)>Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Imagen:</strong>
                    <input type="file" name="imagen" class="form-control" accept="image/*" onchange="previewImage(event)">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <img id="imagePreview" 
                     src="{{ asset('images/servicios/'.$servicio->imagen) }}" 
                     alt="Vista previa de la imagen" 
                     style="max-width: 200px;">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = "{{ asset('images/servicios/'.$servicio->imagen) }}";
        }
    }
</script>

@endsection