<?php

use Illuminate\Database\Migrations\Migration;

/**
 * Garante que o arquivo SQLite exista antes das migrations que criam tabelas.
 *
 * Observação:
 * - Esta migration apenas cria o arquivo se não existir.
 * - O método down() é intencionalmente vazio para evitar remoção automática do arquivo.
 * - Em ambientes onde o DB não é sqlite, este arquivo não causa efeito.
 */
return new class extends Migration {
    public function up(): void
    {
        $path = database_path('database.sqlite');

        // Se o arquivo não existir, cria a pasta (se necessário) e o arquivo
        if (! file_exists($path)) {
            if (! is_dir(database_path())) {
                mkdir(database_path(), 0755, true);
            }
            touch($path);
            @chmod($path, 0664); // compatível com Unix; em Windows é ignorado
        }
    }

    public function down(): void
    {
        // Intencionalmente vazio: não removemos o arquivo automaticamente no rollback
    }
};
