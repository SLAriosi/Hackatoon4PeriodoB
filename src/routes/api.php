<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\AmbientesReservaController;
use App\Http\Controllers\UserController;

// ...existing code...

Route::get('/ambientes', [AmbienteController::class, 'index']); // Listar todos os ambientes
Route::post('/ambientes', [AmbienteController::class, 'store']); // Criar um novo ambiente
Route::get('/ambientes/{id}', [AmbienteController::class, 'show']); // Mostrar um ambiente específico
Route::put('/ambientes/{id}', [AmbienteController::class, 'update']); // Atualizar um ambiente específico
Route::delete('/ambientes/{id}', [AmbienteController::class, 'destroy']); // Deletar um ambiente específico

Route::get('/users', [UserController::class, 'index'])->name('getUsers');
Route::get('/users/{id}', [UserController::class, 'show'])->name('getUser');
Route::post('/users', [UserController::class, 'store'])->name('createUser');
Route::put('/users/{id}', [UserController::class, 'update'])->name('updateUser');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('deleteUser');

Route::get('/ambientes_reservas', [AmbientesReservaController::class, 'index']);
Route::get('/ambientes_reservas/{id}/{data_reserva}', [AmbientesReservaController::class, 'getAvailablePeriods']);
Route::get('/ambientes_reservas/{id}', [AmbientesReservaController::class, 'show']);
Route::post('/ambientes_reservas', [AmbientesReservaController::class, 'store']);
Route::put('/ambientes_reservas/{id}', [AmbientesReservaController::class, 'update']);
Route::delete('/ambientes_reservas/{id}', [AmbientesReservaController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);
