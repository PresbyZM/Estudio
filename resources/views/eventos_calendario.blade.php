@extends('layouts.base')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
    }

    .container {
        height: 450px;
        width: 300px;
        box-shadow: 0 10px 20px #000;
        background-size: cover;
        justify-content: center;
        align-items: center;
        text-align: center;
        overflow: hidden;
        font-family: sans-serif;
    }

    .shape {
        background-color: #002244;
        height: 250px;
        width: 400px;
        margin-left: -20px;
        position: relative;
        top: -80px;
        box-shadow: 0 2px 15px #000;
        transform: rotate(25deg);
    }

    .image {
        height: 100px;
        width: 100px;
        background-image: url();
        position: relative;
        top: 200px;
        margin-left: 170px;
        background-size: cover;
        border: none;
        border-radius: 50%;
        box-shadow: 0 2px 15px rgb(58, 54, 54);
        transform: rotate(-20deg);
    }
</style>

<div class="container">
    <div class="shape">
        <div class="image"></div>
    </div>
    <h3>Jose Zuñiga</h3>
    <h4 class="title">Diseñador</h4>
    <p>
        Male
        <br>
        14-sep-1990
        <br>
        @josezuñiga
    </p>
</div>

@endsection
