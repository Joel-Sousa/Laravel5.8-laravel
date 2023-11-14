<?php

use App\Http\Controllers\AutenticadorController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function(){
    Route::post('registro', [AutenticadorController::class, 'registro']);
    Route::post('login', [AutenticadorController::class, 'login']);
    Route::get('registro/ativar/{id}/{token}', [AutenticadorController::class, 'ativarRegistro']);

    Route::middleware('auth:api')->group(function(){
        Route::post('logout', [AutenticadorController::class, 'logout']);
    });
    
});

Route::get('produtos', [ProdutosController::class, 'index'])->middleware('auth:api');