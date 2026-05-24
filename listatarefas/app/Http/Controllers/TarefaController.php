<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Tarefa;
use Illuminate\Http\Request;

/**
 * Controlador para operações básicas de tarefas.
 *
 * - index: lista tarefas (com categoria) e fornece categorias para o formulário.
 * - store: valida e cria tarefa.
 * - destroy: exclui tarefa.
 */
class TarefaController extends Controller
{
    /**
     * Exibe a lista de tarefas e as categorias para o formulário.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // with('categoria') evita consultas extras ao acessar $tarefa->categoria na view
        $tarefas = Tarefa::with('categoria')->orderBy('data_entrega')->get();
        $categorias = Categoria::orderBy('nome')->get();

        return view('tarefas.index', compact('tarefas', 'categorias'));
    }

    /**
     * Valida e cria uma nova tarefa.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|min:5|max:50',
            'descricao' => 'required|min:10',
            'prioridade' => 'required|in:Baixa,Média,Alta',
            'data_entrega' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        Tarefa::create($data);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso.');
    }

    /**
     * Exclui a tarefa informada (route model binding).
     *
     * @param Tarefa $tarefa
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
