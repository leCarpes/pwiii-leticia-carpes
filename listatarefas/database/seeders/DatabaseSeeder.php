<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder
 *
 * Ponto central para executar seeders do projeto.
 * - Chama os seeders necessários em ordem.
 * - Ao executar `php artisan db:seed`, este método é invocado.
 */
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Chama o seeder de categorias primeiro para garantir FK em outros seeders
        $this->call([
            CategoriaSeeder::class
            //TarefaSeeder::class
        ]);
    }
}
