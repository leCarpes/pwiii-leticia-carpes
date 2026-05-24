<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Cria a tabela `categorias`.
 *
 * Resumo:
 * - Armazena categorias únicas pelo campo `nome`.
 * - `nome` é único para evitar duplicatas.
 * - Timestamps para controle de criação/atualização.
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // PK auto-increment
            $table->string('nome')->unique(); // nome da categoria (único)
            $table->timestamps(); // created_at e updated_at
        });
    }

    public function down(): void
    {
        // Remove a tabela caso seja necessário rollback
        Schema::dropIfExists('categorias');
    }
};
