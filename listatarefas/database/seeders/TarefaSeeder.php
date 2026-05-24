<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

/**
 * TarefaSeeder
 *
 * Gera um conjunto de tarefas "automáticas" para popular a tabela `tarefas`.
 * - Busca ids de categorias existentes para associar as tarefas.
 * - Usa updateOrInsert com 'titulo' como chave para evitar duplicação em execuções repetidas.
 * - Gera datas de entrega incrementais (hoje + N dias).
 */
class TarefaSeeder extends Seeder
{
    public function run(): void
    {
        // Recupera todos os ids de categorias; se não houver, $categoriaPadrao será null
        $categorias = DB::table('categorias')->pluck('id')->toArray();
        $categoriaPadrao = Arr::first($categorias) ?: null;

        // Opções de prioridade válidas (devem corresponder ao enum na migration)
        $prioridades = ['Baixa','Média','Alta'];

        // Gera 10 tarefas; updateOrInsert evita duplicação por título
        for ($i = 1; $i <= 10; $i++) {
            DB::table('tarefas')->updateOrInsert(
                // Chave para identificar tarefa existente
                ['titulo' => "Tarefa automática {$i}"],
                // Dados a inserir/atualizar
                [
                    'descricao' => "Descrição automática {$i}",
                    'prioridade' => $prioridades[array_rand($prioridades)],
                    'data_entrega' => now()->addDays($i)->toDateString(),
                    'categoria_id' => $categoriaPadrao,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
