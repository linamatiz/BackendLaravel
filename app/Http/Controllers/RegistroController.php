<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Response;

class RegistroController extends Controller
{
    public function registrar(Request $request) {
        $user = new User();

        $user->numero_documento = $request -> numero_documento;
        $user->nombre = $request -> nombre;
        $user->apellido = $request -> apellido;
        $user->correo = $request -> correo;
        $user->password = Hash::make($request -> password);

        $user->save();

        try {
            $user->save();
    
            return response()->json([
                'message' => 'Registro exitoso',
                'estatus' => '200'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al registrar usuario',
                'estatus' => '400'
            ]);
        }
    
    }
}

