<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\AuthController::class, 'Login']);


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'Logout']);
    
    Route::get('/grupo/{id}', [App\Http\Controllers\GrupoController::class, 'Buscar']);
    Route::get('/grupos', [App\Http\Controllers\GrupoController::class, 'Listar']);

    Route::get('/cliente/{id}', [App\Http\Controllers\ClienteController::class, 'Buscar']);
    Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'Listar']);
});


Route::middleware(['auth:sanctum', 'ability:admin'])->group(function(){
    Route::post('/grupo', [App\Http\Controllers\GrupoController::class, 'Cadastrar']);
    Route::put('/grupo', [App\Http\Controllers\GrupoController::class, 'Editar']);
    Route::delete('/grupo/{id}', [App\Http\Controllers\GrupoController::class, 'Excluir']);

    Route::post('/cliente', [App\Http\Controllers\ClienteController::class, 'Cadastrar']);
    Route::put('/cliente', [App\Http\Controllers\ClienteController::class, 'Editar']);
    Route::delete('/cliente/{id}', [App\Http\Controllers\ClienteController::class, 'Excluir']);
});
