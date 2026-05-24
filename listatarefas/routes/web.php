<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rotas principais da aplicação.
| - A rota raiz mostra a lista de tarefas (index do TarefaController).
| - Resource routes são usadas para manter o código conciso.
|
*/

// Rota raiz apontando para index das tarefas
Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');

// Rotas de tarefas: apenas index, store e destroy são necessárias
Route::resource('tarefas', TarefaController::class)->only(['index','store','destroy']);

// Rotas de categorias: todas exceto create e show (index, store, edit, update, destroy)
Route::resource('categorias', CategoriaController::class)->except(['create','show']);
