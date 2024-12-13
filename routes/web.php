<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/todos', [TaskController::class, 'index'])->name('todos.index');
Route::get('/todos/create', [TaskController::class, 'create'])->name('todos.create');
Route::post('/todos', [TaskController::class, 'store']);
Route::get('/todos/{id}', [TaskController::class, 'show'])->name('todos.show');
Route::get('/todos/{id}/edit', [TaskController::class, 'edit']);
Route::put('/todos/{id}', [TaskController::class, 'update']);
Route::delete('/todos/{id}', [TaskController::class, 'destroy']);

