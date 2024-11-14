<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request){
        $request->validate([
            'email_usuario' => 'required|max:50|email|unique:usuarios,email_usuario',
            'password' => [
                'required',
                'string',
                'min:8', // 3.3 Longitud mínima de 8 caracteres
                'max:20', // 3.3 Longitud mínima de 8 caracteres
                'regex:/[a-z]/', // 3.1 Contiene letras minúsculas
                'regex:/[A-Z]/', // 3.1 Contiene letras mayúsculas
                'regex:/[0-9]/', // 3.2 Contiene números
                'regex:/[@$!%*?&#]/', // 3.2 Contiene signos especiales
                
            ],
            'nombre_usuario' => 'required|string|max:30',
            'apellidom_usuario' => 'required|string|max:30',
            'apellidop_usuario' => 'required|string|max:30',
        ]);

        $usuario = new User();
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->apellidop_usuario = $request->apellidop_usuario;
        $usuario->apellidom_usuario = $request->apellidom_usuario;
        $usuario->email_usuario = $request->email_usuario;
        $usuario->password = Hash::make($request->password);

        $usuario->save();

        Auth::login($usuario);

        return response()->json(['success' => true, 'redirect' => route('login')]);
    }

    public function login(Request $request){

        
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
            'secret' => '6Ldn4w8qAAAAAHcomjE2hve361vT9Jv4DzGPLiAC',
            'response'=> $request->input('g-recaptcha-response')
        ])->object();

        if ($response->success && $response->score >= 0.7) {

        } else {
            return redirect('/')->with('error', 'reCaptcha fallido');
        }
        
        
        //return $response;

        //validacion
        $credentials = [
            "email_usuario" => $request->email_usuario,
            "password" => $request->password,
        ];
        
        $remember = ($request->has('remember') ? true : false);
        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('inicio'))->with('success', 'Inicio de sesión exitoso.');

        }else{
            return redirect('/')->with('error', 'Las credenciales no coinciden.');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
