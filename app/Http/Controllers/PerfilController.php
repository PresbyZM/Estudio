<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PerfilController extends Controller
{
    public function edit()
    {
        return view('editar_perfil', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_usuario' => 'required|string|max:30',
            'apellidop_usuario' => 'nullable|string|max:30',
            'apellidom_usuario' => 'nullable|string|max:30',
            'email_usuario' => 'required|string|email|max:30|unique:usuarios,email_usuario,' . auth()->id(),
            'current_password' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::find(auth()->id());

        if ($user) {
            // Verificar la contraseña actual
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Contraseña actual incorrecta.');
            }

            // Actualizar datos del usuario
            $user->nombre_usuario = $request->nombre_usuario;
            $user->apellidop_usuario = $request->apellidop_usuario;
            $user->apellidom_usuario = $request->apellidom_usuario;
            $user->email_usuario = $request->email_usuario;

            // Actualizar contraseña solo si se proporciona una nueva contraseña
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            // Guardar el usuario
            $user->save();

            return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado correctamente');
        }

        return redirect()->back()->with('error', 'No se encontró el usuario.');
    }
}
