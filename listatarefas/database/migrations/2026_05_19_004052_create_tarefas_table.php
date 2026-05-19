<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {

            $table->id();

            $table->string('titulo');

            $table->text('descricao');

            $table->enum(
                'prioridade',
                ['Baixa','Média','Alta']
            );

            $table->date('data_entrega');

            $table->foreignId('categoria_id')
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }


};
