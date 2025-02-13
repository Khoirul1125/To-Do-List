<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\TodoItemController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/checklists', [ChecklistController::class, 'index']);
    Route::post('/checklists', [ChecklistController::class, 'store']);
    Route::get('/checklists/{id}', [ChecklistController::class, 'show']);
    Route::put('/checklists/{id}', [ChecklistController::class, 'update']);
    Route::delete('/checklists/{id}', [ChecklistController::class, 'destroy']);
    
    Route::post('/checklists/{id}/items', [TodoItemController::class, 'store']);
    Route::get('/items/{id}', [TodoItemController::class, 'show']);
    Route::put('/items/{id}', [TodoItemController::class, 'update']);
    Route::delete('/items/{id}', [TodoItemController::class, 'destroy']);
    Route::patch('/items/{id}/toggle', [TodoItemController::class, 'toggleStatus']);
});