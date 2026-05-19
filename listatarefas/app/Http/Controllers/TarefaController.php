<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::with(
            'categoria'
        )->get();

        $categorias = Categoria::all();

        return view(
            'tarefas.index',
            compact(
                'tarefas',
                'categorias'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'titulo' =>
            'required|min:5|max:50',

            'descricao' =>
            'required|min:10',

            'prioridade' =>
            'required',

            'data_entrega' =>
            'required|date',

            'categoria_id' =>
            'required|exists:categorias,id'

        ]);

        Tarefa::create([

            'titulo' => $request->titulo,

            'descricao' => $request->descricao,

            'prioridade' => $request->prioridade,

            'data_entrega' => $request->data_entrega,

            'categoria_id' => $request->categoria_id

        ]);

        return redirect('/');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();

        return redirect('/')
            ->with(
                'sucesso',
                'Tarefa excluída com sucesso!'
            );
    }
}