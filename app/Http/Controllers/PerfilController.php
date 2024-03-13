<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Response;

class PerfilController extends Controller
{
    public function perfilUsuario(Request $request) {
        $numero_documento = $request->numero_documento;

        try {
            $usuario = User::where('numero_documento', $numero_documento)->first();

            return response()->json([
                'message' => 'Consulta exitosa',
                'estatus' => '200',
                'response' => $usuario
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'message' => 'Error al realizar la consulta',
                'estatus' => '400'
            ]);
        }
    }
}
