<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Cria a tabela `tarefas`.
 *
 * Campos principais:
 * - titulo: string curta
 * - descricao: texto livre
 * - prioridade: enum (Baixa, Média, Alta)
 * - data_entrega: data de entrega
 * - categoria_id: FK para categorias (nullable, cascade on delete)
 * - timestamps: created_at, updated_at
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // título da tarefa
            $table->text('descricao'); // descrição detalhada
            $table->enum('prioridade', ['Baixa', 'Média', 'Alta']); // valores permitidos
            $table->date('data_entrega'); // data de entrega
            // FK para categorias; nullable permite tarefas sem categoria
            // onDelete('cascade') remove tarefas quando a categoria for excluída
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
