<?php

namespace App\Http\Controllers;

use App\Models\User_cli;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UsuariosClientesController extends Controller
{
    public function index()
    {
        $users = User_cli::all();
        return view('perfiles_index', compact('users'));
    }

    public function edit($id)
    {
        $user = User_cli::findOrFail($id);
        return view('perfiles_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_usuacli' => 'required|max:30',
            'apellidop_usuacli' => 'nullable|max:30',
            'apellidom_usuacli' => 'nullable|max:30',
            'telefono_usuacli' => 'nullable|max:30',
            'email_usuacli' => 'required|email|max:30|unique:usuarios_clientes,email_usuacli,'.$id,
            'password' => 'required|confirmed|min:8|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/',
        ]);

        $user = User_cli::findOrFail($id);
        $user->update($request->all());

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->route('perfiles_index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        User_cli::destroy($id);
        return redirect()->route('perfiles_index')->with('success', 'Usuario eliminado correctamente');
    }

    public function getDaysSinceLastConnection(User_cli $user)
    {
        if ($user->last_login_at) {
            return Carbon::now()->diffInDays($user->last_login_at);
        }
        return null;
    }
}
