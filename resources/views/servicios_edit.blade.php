@extends('layouts.base')

@section('content')
<br>
<br>
<div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
    <div class="card shadow-lg" style="width: 800px; border-radius: 15px; background-color: #f7f9fc;">
        <div class="card-header text-white text-center" style="background-color: #34495e; border-radius: 15px 15px 0 0;">
            <h2>Editar Servicio</h2>
        </div>
        <div class="card-body" style="padding: 20px;">
            <div class="mb-3 text-end">
                <a href="{{route('servicios.index')}}" class="btn btn-outline-secondary btn-sm">Volver</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>No puede ser!!! </strong> Algo fue mal..<br><br>
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

                <div class="mb-2">
                    <label for="nombre_servicio" class="form-label"><strong>Servicio:</strong></label>
                    <input type="text" name="nombre_servicio" class="form-control form-control-sm" placeholder="Servicio" value="{{$servicio->nombre_servicio}}">
                </div>

                <div class="mb-2">
                    <label for="descripcion_servicio" class="form-label"><strong>Descripción:</strong></label>
                    <textarea class="form-control form-control-sm" style="height:80px" name="descripcion_servicio" placeholder="Descripción...">{{$servicio->descripcion_servicio}}</textarea>
                </div>

                <div class="mb-2">
                    <label for="precio_servicio" class="form-label"><strong>Precio:</strong></label>
                    <input type="number" name="precio_servicio" class="form-control form-control-sm" placeholder="Precio del servicio" value="{{$servicio->precio_servicio}}">
                </div>

                <div class="mb-2">
                    <label for="categoria" class="form-label"><strong>Categoría:</strong></label>
                    <select name="categoria" class="form-select form-select-sm">
                        <option value="">-- Elige la categoría --</option>
                        <option value="Paquetes" @selected("Paquetes" == $servicio->categoria)>Paquetes</option>
                        <option value="Cuadros" @selected("Cuadros" == $servicio->categoria)>Cuadros</option>
                        <option value="Filmacion" @selected("Filmacion" == $servicio->categoria)>Filmación</option>
                        <option value="Fotografias" @selected("Fotografias" == $servicio->categoria)>Fotografías</option>
                        <option value="Edicion" @selected("Edicion" == $servicio->categoria)>Edición</option>
                        <option value="Otros" @selected("Otros" == $servicio->categoria)>Otros</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label for="imagen" class="form-label"><strong>Imagen:</strong></label>
                    <input type="file" name="imagen" class="form-control form-control-sm" accept="image/*" onchange="previewImage(event)">
                </div>

                <div class="mb-3 text-center">
                    <img id="imagePreview" 
                         src="{{ asset('images/servicios/'.$servicio->imagen) }}" 
                         alt="Vista previa de la imagen" 
                         style="max-width: 150px; border: 1px solid #bdc3c7; padding: 5px; border-radius: 8px;">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>



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

<style>

body {
    background-color: #e9ecf2; 
}


.card {
    margin-top: 150px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    border: none;
}


.card-header {
    font-size: 20px;
    font-weight: 600;
}


.btn-primary {
    background-color: #34495e;
    border-color: #34495e;
    font-size: 14px;
    border-radius: 8px;
}

.btn-primary:hover {
    background-color: #2c3e50;
    border-color: #2c3e50;
}

.btn-outline-secondary {
    border-radius: 8px;
    font-size: 12px;
}

.btn-outline-secondary:hover {
    background-color: #bdc3c7;
    border-color: #bdc3c7;
}


.form-control,
.form-select {
    border-radius: 6px;
    border: 1px solid #dcdde1;
    transition: all 0.3s;
    font-size: 14px;
    padding: 6px;
}

.form-control:focus,
.form-select:focus {
    border-color: #34495e;
    box-shadow: 0 0 0 0.2rem rgba(52, 73, 94, 0.25);
}
</style>
@endsection

