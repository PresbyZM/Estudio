@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h1 class="color-changing-shadow">Bienvenido a "FOTO Y VIDEO CALVARIO"</h1>
                <p class="lead">Siempre la mejor calidad y creatividad en cada imagen.</p>
                <div class="camera-animation">
                    <!-- Logo -->
                    <img src="{{ asset('images/logosinfondo.png') }}" alt="Logo" width="120">
                </div>
            </div>
        </div>
    </div>



    @parent
    <style>
        body {
            background-color: #222;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .camera-animation {
            margin-top: 50px;
            animation: bounce 2s ease-in-out infinite alternate;
        }

        @keyframes bounce {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-20px);
            }
        }

        h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            position: relative;
            text-transform: uppercase;
        }

        .color-changing-shadow {
            position: relative;
            overflow: hidden;
        }

        .color-changing-shadow::before {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #fff;
            mix-blend-mode: overlay;
            animation: color-change 5s infinite alternate;
        }

        @keyframes color-change {
            0%, 100% {
                transform: translateX(-100%);
                color: #fff; 
            }
            50% {
                transform: translateX(0);
                color: #add8e6; 
            }
        }

        p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #ccc;
            max-width: 600px;
            margin: 0 auto 40px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

