<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * CategoriaSeeder
 *
 * Popula a tabela `categorias` com um conjunto inicial de categorias.
 * - Usa updateOrInsert para ser idempotente: pode ser executado várias vezes sem duplicar registros.
 * - Ideal para garantir que categorias básicas existam em ambientes de desenvolvimento/testes.
 */
class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        // Lista de categorias iniciais a serem garantidas no banco
        $categorias = [
            ['nome' => 'Geral'],
            ['nome' => 'Trabalho'],
            ['nome' => 'Estudo'],
            ['nome' => 'Pessoal'],
        ];

        // Percorre cada categoria e insere ou atualiza timestamps se já existir
        foreach ($categorias as $cat) {
            DB::table('categorias')->updateOrInsert(
                // Condição para encontrar registro existente (evita duplicatas)
                ['nome' => $cat['nome']],
                // Valores a inserir/atualizar (aqui apenas timestamps)
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
