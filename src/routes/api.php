<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AmbienteController;

// ...existing code...

Route::middleware(['cors'])->group(function () {
    Route::get('/ambientes', [AmbienteController::class, 'index']); // Listar todos os ambientes
    Route::post('/ambientes', [AmbienteController::class, 'store']); // Criar um novo ambiente
    Route::get('/ambientes/{id}', [AmbienteController::class, 'show']); // Mostrar um ambiente específico
    Route::put('/ambientes/{id}', [AmbienteController::class, 'update']); // Atualizar um ambiente específico
    Route::delete('/ambientes/{id}', [AmbienteController::class, 'destroy']); // Deletar um ambiente específico
});

Route::post('/login', [AuthController::class, 'login']);
