@extends('layouts.base')

@section('content')
<br>
<br>
<br>
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear servicio</h2>
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

    <form action="{{route('servicios.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Servicio:</strong>
                    <input type="text" name="nombre_servicio" class="form-control" placeholder="Servicio" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion_servicio" placeholder="Descripción..."></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="number" name="precio_servicio" class="form-control" placeholder="Precio del servicio" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Categoria (inicial):</strong>
                    <select name="categoria" class="form-select" id="">
                        <option value="">-- Elige la categoria --</option>
                        <option value="Paquetes">Paquetes</option>
                        <option value="Cuadros">Cuadros</option>
                        <option value="Filmacion">Filmacion</option>
                        <option value="Fotografias">Fotografias</option>
                        <option value="Edicion">Edicion</option>
                        <option value="Otros">Otros</option>
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
                <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="max-width: 200px; display: none;">
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
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
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    }
</script>
@endsection