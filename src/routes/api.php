<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AmbienteController;

// ...existing code...

Route::prefix('ambientes')->group(function () {
    Route::get('/', [AmbienteController::class, 'index']); // Listar todos os ambientes
    Route::post('/', [AmbienteController::class, 'store']); // Criar um novo ambiente
    Route::get('/{id}', [AmbienteController::class, 'show']); // Mostrar um ambiente específico
    Route::put('/{id}', [AmbienteController::class, 'update']); // Atualizar um ambiente específico
    Route::delete('/{id}', [AmbienteController::class, 'destroy']); // Deletar um ambiente específico
});

Route::post('/login', [AuthController::class, 'login']);
