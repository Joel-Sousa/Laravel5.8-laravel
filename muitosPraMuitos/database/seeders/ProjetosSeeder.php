<?php

namespace Database\Seeders;

use App\Models\Projeto;
use Illuminate\Database\Seeder;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            // (object) ['nome' => 'Sistema de alocacao de recursos', 'estimativaHoras' => 300],

            (object) ['nome' => 'Sistema de alocacao de recursos', 'estimativaHoras' => 100],
            (object) ['nome' => 'Sistema de alocacao de recursos1', 'estimativaHoras' => 200],
            (object) ['nome' => 'Sistema de alocacao de recursos2', 'estimativaHoras' => 300],
            (object) ['nome' => 'Sistema de alocacao de recursos11', 'estimativaHoras' => 300],
        ];

        foreach($data as $e){
            Projeto::create([
                'nome' => $e->nome, 
                'estimativaHoras' => $e->estimativaHoras,
            ]);
        }
    }
}
