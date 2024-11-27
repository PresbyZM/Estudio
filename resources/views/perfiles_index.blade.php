@extends('layouts.base')
<br>
<br>
<br>
@section('content')


<div class="container">
    <h1>Lista de Usuarios</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th class="text1">Nombre</th>
                <th class="text1">Apellido Paterno</th>
                <th class="text1">Apellido Materno</th>
                <th class="text1">Email</th>
                <th class="text1">Telefono</th>
                <th class="text1">Días sin conexión</th>
                <th class="text1">Acciones</th>
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
                    <a href="{{ route('perfiles_edit', $user->id) }}" class="btn btn-primary" onclick="showLoader()">Editar</a>
                    <form action="{{ route('destroy_user', $user->id) }}" method="POST" style="display:inline;" onsubmit="showLoader()">
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

<style>

.container {
    background-color: #f9f9f9; 
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.text1{
    font-weight: 700;
    color: #162B4E;
}

.table thead th {
    text-align: left;
    color: #2c3e50; 
    font-weight: 600;
    border-bottom: 2px solid #3498db; 
    padding: 10px;
}


.table tbody tr {
    border-bottom: 1px solid #dfe6e9; 
    transition: background-color 0.3s ease;
}

.table tbody tr:hover {
    background-color: #ecf6fc;
}

/
.table td {
    color: #34495e; 
    padding: 12px 10px;
}


.btn-warning {
    background-color: #f39c12;
    border: none;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.btn-warning:hover {
    background-color: #e67e22;
}

.btn-danger {
    background-color: #e74c3c;
    border: none;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.btn-danger:hover {
    background-color: #c0392b;
}




h1 {
    color: #2c3e50; 
    font-size: 24px;
    margin-bottom: 20px;
    border-bottom: 2px solid #3498db; 
    display: inline-block;
    padding-bottom: 8px;
}
</style>
@endsection
