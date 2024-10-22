<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/filme', [FilmeController::class,'listar']);
Route::post('/filme', [FilmeController::class,'salvar']);
Route::put('/filme/{id}', [FilmeController::class,'editar']);
Route::delete('/filme/{id}', [FilmeController::class,'excluir']);
Route::get('/filme/{id}', [FilmeController::class,'listarPeloId']);
