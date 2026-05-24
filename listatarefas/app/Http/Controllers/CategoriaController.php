<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * Controlador para CRUD de categorias.
 *
 * Métodos:
 * - index: lista categorias.
 * - store: valida e cria.
 * - edit/update: edita.
 * - destroy: exclui.
 *
 * Observação: as views esperam rotas nomeadas (ex.: route('categorias.index')).
 */
class CategoriaController extends Controller
{
    /**
     * Lista todas as categorias ordenadas por nome.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Valida e cria uma nova categoria.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:100|unique:categorias,nome',
        ]);

        Categoria::create($data);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada.');
    }

    /**
     * Exibe o formulário de edição.
     *
     * @param Categoria $categoria
     * @return \Illuminate\View\View
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Atualiza a categoria.
     *
     * @param Request $request
     * @param Categoria $categoria
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Categoria $categoria)
    {
        $data = $request->validate([
            // permite manter o mesmo nome da categoria atual
            'nome' => 'required|string|max:100|unique:categorias,nome,' . $categoria->id,
        ]);

        $categoria->update($data);

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada.');
    }

    /**
     * Remove a categoria.
     *
     * @param Categoria $categoria
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Categoria $categoria)
    {
        // Se a FK estiver com cascade, tarefas relacionadas serão removidas.
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída.');
    }
}
