<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
Route::put('/tarefas/{tarefa}', [TarefaController::class, 'update'])->name('tarefas.update');
Route::delete('/tarefas/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

Route::post('/tarefas/reorder', [TarefaController::class, 'reorder'])->name('tarefas.reorder');