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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Cria uma chave primária autoincrement
            $table->string('title'); // Título
            $table->string('author'); // Autor
            $table->string('isbn')->unique(); // ISBN (único)
            $table->integer('pages'); // Páginas
            $table->boolean('is_available')->default(true); // Disponível (true/false)
            $table->timestamps(); // Cria colunas create_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
