<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PerfilController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/inicio-sesion', [LoginController::class, 'login'])->name('inicio-sesion');
Route::get('/cerrarSesion', [LoginController::class, 'cerrarSesion'])->name('cerrarSesion');
Route::post('/create',[RegistroController::class, 'registrar'])->name('create');
Route::get('/perfil',[PerfilController::class, 'perfilUsuario'])->name('perfilUsuario');
Route::post('/actualizarUsuario',[PerfilController::class, 'actualizarUsuario'])->name('actualizarUsuario');


