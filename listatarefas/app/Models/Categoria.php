<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [

        // Campos permitidos
        'nome'

    ];

    public function tarefas()
    {
        // Uma categoria possui várias tarefas
        return $this->hasMany(
            Tarefa::class
        );
    }
}