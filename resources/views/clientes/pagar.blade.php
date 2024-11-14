@extends('../layouts.base_cliente')

@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/create.css') }}">
<link rel="stylesheet" href="/css/clientes/pago.css">

<div class="container animate__animated animate__fadeIn">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <div class="text-center mb-4">
                <h2 class="text-dark">Pagar y Contactar al Estudio</h2>
                <p class="text-muted">Para que su evento sea aceptado, debe mandar la captura del pago al estudio fotográfico.</p>
            </div>
 
            <div class="card mb-4 shadow-lg" id="tarjeta-banco">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="text-light">Banco Azteca</h5>
                        </div>
                        <img src="{{ asset('images/banco_azteca_logo.png') }}" alt="Banco Azteca" style="width: 60px;">
                    </div>
                    <div class="mb-4">
                        <p class="text-light">Número de Cuenta:</p>
                        <h3 class="text-light">1234 5678 9101 1121</h3>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-light">Titular: Estudio Fotográfico</p>
                        <p class="text-light">Válida hasta: 12/27</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Botón de WhatsApp -->
                <div class="col-md-6 mb-3">
                    <a href="https://wa.me/5217721642935?text=Hola,%20deseo%20contactar%20con%20el%20estudio%20fotográfico%20para%20enviar%20la%20captura%20de%20pago%20del%20evento:%20{{ urlencode($peticion->nombre_evento_peticion) }}%20el%20día%20{{ urlencode($peticion->dia_evento_peticion) }}." target="_blank" class="btn btn-custom-whatsapp">
                        <i class="fa-brands fa-whatsapp" style="color: #ffffff;"></i> Contactar por WhatsApp
                    </a>
                </div>

                <!-- Botón de Gmail -->
                <div class="col-md-6 mb-3">
                    <a href="mailto:presbyzenilmacotela@gmail.com.com?subject=Captura%20de%20pago%20del%20evento%20{{ urlencode($peticion->nombre_evento_peticion) }}&body=Adjunto%20la%20captura%20del%20pago%20del%20evento%20que%20se%20celebrará%20el%20{{ urlencode($peticion->dia_evento_peticion) }}." target="_blank" class="btn btn-custom-gmail">
                        <i class="fa fa-envelope"></i> Contactar al estudio por Gmail
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
