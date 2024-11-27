@extends('layouts.base')

@section('content')
<br>
<br>
<br>
<br>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg" style="width: 600px; border-radius: 15px; background-color: #f7f9fc;">
        <div class="card-header text-white text-center" style="background-color: #28335c; border-radius: 15px 15px 0 0;">
            <h2>Crear Servicio</h2>
        </div>
        <div class="card-body">
            <div class="mb-3 text-end">
                <a href="{{route('servicios.index')}}" class="btn btn-outline-secondary" onclick="showLoader()">Volver</a>
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

            <form action="{{route('servicios.store')}}" method="POST" enctype="multipart/form-data" onsubmit="showLoader()">
                @csrf

                <div class="mb-3">
                    <label for="nombre_servicio" class="form-label"><strong>Servicio:</strong></label>
                    <input type="text" name="nombre_servicio" class="form-control" placeholder="Servicio">
                </div>

                <div class="mb-3">
                    <label for="descripcion_servicio" class="form-label"><strong>Descripción:</strong></label>
                    <textarea class="form-control" style="height:150px" name="descripcion_servicio" placeholder="Descripción..."></textarea>
                </div>

                <div class="mb-3">
                    <label for="precio_servicio" class="form-label"><strong>Precio:</strong></label>
                    <input type="number" name="precio_servicio" class="form-control" placeholder="Precio del servicio">
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label"><strong>Categoría:</strong></label>
                    <select name="categoria" class="form-select">
                        <option value="">-- Elige la categoría --</option>
                        <option value="Paquetes">Paquetes</option>
                        <option value="Cuadros">Cuadros</option>
                        <option value="Filmacion">Filmación</option>
                        <option value="Fotografias">Fotografías</option>
                        <option value="Edicion">Edición</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label"><strong>Imagen:</strong></label>
                    <input type="file" name="imagen" class="form-control" accept="image/*" onchange="previewImage(event)">
                </div>

                <div class="mb-3 text-center">
                    <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="max-width: 200px; display: none;">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    }
</script>

<style>

body {
    background-color: #e9ecf2; 
}


.card {
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    border: none;
}


.card-header {
    font-size: 24px;
    font-weight: 600;
}


.btn-primary {
    background-color: #28335c;
    border-color: #28335c;
    font-size: 16px;
    border-radius: 8px;
}

.btn-primary:hover {
    background-color: #2c3e50;
    border-color: #2c3e50;
}

.btn-outline-secondary {
    border-radius: 8px;
    font-size: 14px;
}

.btn-outline-secondary:hover {
    background-color: #bdc3c7;
    border-color: #bdc3c7;
}


.form-control {
    border-radius: 8px;
    border: 1px solid #dcdde1;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #28335c;
    box-shadow: 0 0 0 0.2rem rgba(52, 73, 94, 0.25);
}


#imagePreview {
    border: 1px solid #bdc3c7;
    padding: 5px;
    border-radius: 8px;
}
</style>
@endsection
