<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Categoria
 *
 * Representa uma categoria de tarefas.
 * - Armazena apenas o campo 'nome'.
 * - Relação: uma categoria possui muitas tarefas.
 *
 * Observação: manter $fillable para permitir mass assignment seguro.
 */
class Categoria extends Model
{
    use HasFactory;

    /**
     * Campos permitidos para mass assignment.
     * Sem isso, Categoria::create([...]) será bloqueado pelo Laravel.
     *
     * @var array
     */
    protected $fillable = ['nome'];

    /**
     * Relação 1:N com Tarefa.
     * Use $categoria->tarefas para obter as tarefas relacionadas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
