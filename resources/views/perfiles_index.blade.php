@extends('layouts.base')


@section('content')
<br>
<br>
<br>
<div class="container">
    <h1>Lista de Usuarios</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Días sin conexión</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->nombre_usuacli }}</td>
                <td>{{ $user->apellidop_usuacli }}</td>
                <td>{{ $user->apellidom_usuacli }}</td>
                <td>{{ $user->email_usuacli }}</td>
                <td>{{ $user->telefono_usuacli }}</td>
                <td>{{ $user->last_login_at ? \Carbon\Carbon::now()->diffInDays($user->last_login_at) : '0' }}</td>
                <td>
                    <a href="{{ route('perfiles_edit', $user->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('destroy_user', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection