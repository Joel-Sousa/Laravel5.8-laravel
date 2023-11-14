<?php

namespace Database\Seeders;

use App\Models\Alocacao;
use Illuminate\Database\Seeder;

class AlocacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            // (object) ['idDesenvolvedor' => 1, 'idProjeto' => 4, 'horasSemanais' => 10],

            (object) ['idDesenvolvedor' => 1, 'idProjeto' => 1, 'horasSemanais' => 10],
            (object) ['idDesenvolvedor' => 1, 'idProjeto' => 1, 'horasSemanais' => 10],
            (object) ['idDesenvolvedor' => 2, 'idProjeto' => 2, 'horasSemanais' => 20],
            (object) ['idDesenvolvedor' => 3, 'idProjeto' => 3, 'horasSemanais' => 30],

            (object) ['idDesenvolvedor' => 1, 'idProjeto' => 1, 'horasSemanais' => 100],
            (object) ['idDesenvolvedor' => 2, 'idProjeto' => 2, 'horasSemanais' => 200],
            (object) ['idDesenvolvedor' => 3, 'idProjeto' => 3, 'horasSemanais' => 300],
        ];
        
        foreach($data as $e){
            Alocacao::create([
                'idDesenvolvedor' => $e->idDesenvolvedor, 
                'idProjeto' => $e->idProjeto, 
                'horasSemanais' => $e->horasSemanais
            ]);
        }
        
    }
}
