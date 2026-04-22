<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

// Quando o usuário acessar seu-site.com/livros,
// O método 'index' do controller entra em ação!
Route::get('/', function () {
    return view('welcome');
});

Route::get('/livros', [LivroController::class, 'index']);

Route::get('/buscar/{nome}', [GameController::class, 'search']);
