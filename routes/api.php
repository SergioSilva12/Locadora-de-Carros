<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\locacaoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('cliente', ClienteController::class)->middleware('jwt');
Route::apiResource('carro', CarroController::class)->middleware('jwt');
Route::apiResource('locacao', LocacaoController::class)->middleware('jwt');
Route::apiResource('marca', MarcaController::class)->middleware('jwt');
Route::apiResource('modelo', ModeloController::class)->middleware('jwt');

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);