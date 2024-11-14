<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User_cli;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginCliController extends Controller
{

    public function register(Request $request){

        //validar datos
        $request->validate([
            'nombre_usuacli' => 'required',
            'apellidop_usuacli' => 'required',
            'apellidom_usuacli' => 'required',
            'telefono_usuacli' => 'required',
            'email_usuacli' => 'required|email|unique:usuarios_clientes,email_usuacli',
            'password' => 'required|confirmed|min:8|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/',
        ]);        

        $usuario = new User_cli();

        $usuario->nombre_usuacli = $request->nombre_usuacli;
        $usuario->apellidop_usuacli = $request->apellidop_usuacli;
        $usuario->apellidom_usuacli = $request->apellidom_usuacli;
        $usuario->telefono_usuacli = $request->telefono_usuacli;
        $usuario->email_usuacli = $request->email_usuacli;
        $usuario->password = Hash::make($request->password);

        $cliente = Cliente::create([
            'nombre_cliente' => $usuario->nombre_usuacli,
            'apellidop_cliente' => $usuario->apellidop_usuacli,
            'apellidom_cliente' => $usuario->apellidom_usuacli,
            'telefono_cliente' => $usuario->telefono_usuacli,
            'descripcion_cliente' => null,
        ]);

        $usuario->cliente_id = $cliente->id; 
        $usuario->save();

        return redirect(route('inicio-cli'));
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
            "email_usuacli" => $request->email_usuacli,
            "password" => $request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::guard('clientes')->attempt($credentials,$remember)) {

            $request->session()->regenerate();
            /** @var \App\Models\User_cli $user*/
            $user = Auth::guard('clientes')->user();
            
            $user->last_login_at = now(); 
            $user->save();
            
            return redirect()->intended(route('inicio-cli'));
        }else{
            return redirect()->route('login-cli')->withErrors('Las credenciales no son correctas.');
        }
    }

    public function logout(Request $request){
        Auth::guard('clientes')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login-cli'));
    }

}
