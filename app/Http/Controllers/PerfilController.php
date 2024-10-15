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
            'apellidop_usuario' => 'required|string|max:30',
            'apellidom_usuario' => 'required|string|max:30',
            'email_usuario' => 'required|string|email|max:50|unique:usuarios,email_usuario,' . auth()->id(),
            'current_password' => 'required|string|max:20',
            'password' => [
                'nullable',
                'string',
                'min:8', // 3.3 Longitud mínima de 8 caracteres
                'max:20', // 3.3 Longitud mínima de 8 caracteres
                'regex:/[a-z]/', // 3.1 Contiene letras minúsculas
                'regex:/[A-Z]/', // 3.1 Contiene letras mayúsculas
                'regex:/[0-9]/', // 3.2 Contiene números
                'regex:/[@$!%*?&#]/', // 3.2 Contiene signos especiales
                
            ],
        ]);

        $user = User::find(auth()->id());

        if ($user) {

            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Contraseña actual incorrecta.');
            }


            $user->nombre_usuario = $request->nombre_usuario;
            $user->apellidop_usuario = $request->apellidop_usuario;
            $user->apellidom_usuario = $request->apellidom_usuario;
            $user->email_usuario = $request->email_usuario;


            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

 
            $user->save();

            return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado correctamente');
        }

        return redirect()->back()->with('error', 'No se encontró el usuario.');
    }
}
