@extends('../layouts.base_cliente')

@section('content')
<div class="banner-inicio">
    <img src="/images/clientes/logo_v2.png" alt="Logo" class="banner-logo">
    
    <p class="banner-subtitulo">Momentos reales, recuerdos eternos</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 mb-3">
            <img src="/images/clientes/volante.png" class="card-img-top rounded-2 shadow-lg" alt="Servicios de Fotografía">
        </div>
        <div class="col-md-4 mb-3 d-flex justify-content-end">
            <div class="card w-100">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-map-marker-alt"></i> UBICACIÓN</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="350" style="margin-top: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
