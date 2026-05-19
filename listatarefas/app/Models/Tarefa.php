<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [

    'titulo',
    'descricao',
    'prioridade',
    'data_entrega',
    'categoria_id'

    ];

    public function categoria()
    {
        return $this->belongsTo(
            Categoria::class
        );
    }
}
