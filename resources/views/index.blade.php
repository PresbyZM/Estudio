@extends('layouts.base')

@section('content')
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Bienvenido a "FOTO Y VIDEO CALVARIO"</h1>
            <p class="hero-subtitle">Siempre la mejor calidad y creatividad en cada imagen.</p>
            <div class="logo-container">
                <img src="{{ asset('images/logosinfondo.png') }}" alt="Logo" class="hero-logo">
            </div>
        </div>
    </div>

    @parent
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
            background: #e3f2fd; /* Fondo azul claro */
            color: #333;
        }

        .hero-section {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            text-align: center;
           
        }

        .hero-content {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
            padding: 30px 20px; /* Ajuste de relleno */
            border-radius: 15px; /* Bordes más redondeados */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3); /* Sombra más pronunciada */
            backdrop-filter: blur(15px); /* Desenfoque más intenso */
            width: 80%;
            max-width: 600px; /* Ancho máximo reducido */
            animation: fadeIn 2s ease-out; /* Animación de entrada */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            font-size: 2.5rem; /* Tamaño de fuente reducido */
            color: #0e4166;
            text-transform: uppercase;
            margin-bottom: 15px;
            font-weight: 900;
            letter-spacing: 2px;
            line-height: 1.2;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Sombra de texto ajustada */
            animation: titleAnim 1.5s ease-out; /* Animación de texto */
        }

        @keyframes titleAnim {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-subtitle {
            font-size: 1.2rem; /* Tamaño de fuente reducido */
            color: #555;
            max-width: 500px; /* Ancho máximo reducido */
            margin: 0 auto 30px;
            line-height: 1.6;
            font-weight: 300;
            animation: subtitleAnim 2s ease-out; /* Animación de texto */
        }

        @keyframes subtitleAnim {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-container {
            margin-top: 15px; /* Ajuste de margen */
        }

        .hero-logo {
            max-width: 150px; /* Tamaño del logo reducido */
            height: auto;
            border-radius: 15px; /* Bordes más redondeados */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); /* Sombra ajustada */
            transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
            filter: brightness(1);
            animation: logoHover 2s ease-in-out infinite; /* Efecto de rotación */
        }

        @keyframes logoHover {
            0% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(5deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }

        .hero-logo:hover {
            transform: scale(1.05) rotate(3deg); /* Efecto de zoom y rotación al pasar el ratón */
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4); /* Sombra ajustada */
            filter: brightness(1.2); /* Aumenta el brillo del logo al pasar el ratón */
            animation: none; /* Desactiva la animación de rotación al pasar el ratón */
        }



        @keyframes gradientMove {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }

        @keyframes backgroundBlink {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 1; }
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent 70%);
            mix-blend-mode: overlay;
            pointer-events: none;
            opacity: 0.6; /* Ajuste de la opacidad para un efecto más sutil */
        }
    </style>
@endsection

