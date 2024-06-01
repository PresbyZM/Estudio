<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function register(Request $request){
        //validar los datos
        $usuario = new User();

        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->apellidop_usuario = $request->apellidop_usuario;
        $usuario->apellidom_usuario = $request->apellidom_usuario;
        $usuario->email_usuario = $request->email_usuario;
        $usuario->password = Hash::make($request->password);

        $usuario->save();

        Auth::login($usuario);

        return redirect(route('inicio'));
    }

    public function login(Request $request){
        //validacion

        $credentials = [
            "email_usuario" => $request->email_usuario,
            "password" => $request->password,
        ];
        
        $remember = ($request->has('remember') ? true : false);
        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('inicio'));

        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
