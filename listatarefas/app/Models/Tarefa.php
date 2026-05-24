<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Tarefa
 *
 * Representa uma tarefa do sistema.
 * - Campos principais: titulo, descricao, prioridade, data_entrega, categoria_id.
 * - Pertence a uma Categoria.
 *
 * Importante: definir $fillable para permitir Tarefa::create($data).
 */
class Tarefa extends Model
{
    use HasFactory;

    /**
     * Campos permitidos para mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'prioridade',
        'data_entrega',
        'categoria_id',
    ];

    /**
     * Relação inversa com Categoria.
     * Use $tarefa->categoria para acessar a categoria associada.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
