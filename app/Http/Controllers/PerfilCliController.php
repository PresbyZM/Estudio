<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User_cli;

class PerfilCliController extends Controller
{
 
    public function edit()
    {
        $usuario = Auth::guard('clientes')->user(); 
        return view('clientes.edit-perfil', compact('usuario')); 
    }


    public function update(Request $request)
    {
        
        $request->validate([
            'nombre_usuacli' => 'required',
            'apellidop_usuacli' => 'required',
            'apellidom_usuacli' => 'required',
            'telefono_usuacli' => 'required',
            'email_usuacli' => 'required|email|unique:usuarios_clientes,email_usuacli,' . Auth::guard('clientes')->id(),
            'current_password' => 'required_with:password', 
            'password' => 'nullable|confirmed|min:8|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/',
        ]);

        /** @var \App\Models\User_cli $usuario */
        $usuario = Auth::guard('clientes')->user(); 

        if (!$usuario instanceof User_cli) {
            throw new \Exception("Usuario no autenticado o no es de tipo User_cli.");
        }

        if (!$usuario->cliente) {
            return back()->withErrors(['cliente' => 'El usuario no tiene un cliente asociado.']);
        }

        // Actualiza el cliente
        $usuario->cliente->update([
            'nombre_cliente' => $request->nombre_usuacli,
            'apellidop_cliente' => $request->apellidop_usuacli,
            'apellidom_cliente' => $request->apellidom_usuacli,
            'telefono_cliente' => $request->telefono_usuacli,
        ]);
            
        $usuario->nombre_usuacli = $request->nombre_usuacli;
        $usuario->apellidop_usuacli = $request->apellidop_usuacli;
        $usuario->apellidom_usuacli = $request->apellidom_usuacli;
        $usuario->email_usuacli = $request->email_usuacli;
        $usuario->telefono_usuacli = $request->telefono_usuacli;
  
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        
        $usuario->save(); 


        return redirect()->route('inicio-cli')->with('success', 'Perfil actualizado exitosamente.'); // Redirigir con mensaje
    }
}
