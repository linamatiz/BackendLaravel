<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class LoginController extends Controller {
    public function login(Request $request) {

        $credenciales = [
            "numero_documento" => $request->numero_documento,
            "password" => $request->password,
        ];

        if(Auth::attempt($credenciales, false)) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Inicio de sesión exitoso',
                'estatus' => '200'
            ]);
        }else {
            return response()->json([
                'message' => 'Credenciales inválidas',
                'estatus' => '401'
            ]);
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
