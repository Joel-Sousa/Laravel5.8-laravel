<?php

namespace Database\Seeders;

use App\Models\Desenvolvedor;
use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            (object) ['nome' => 'bernardo', 'cargo' => 'analista pleno'],
            (object) ['nome' => 'bernardo1', 'cargo' => 'analista pleno1'],
            (object) ['nome' => 'bernardo2', 'cargo' => 'analista pleno2'],
        ];
        foreach($data as $e){
            Desenvolvedor::create([
                'nome' => $e->nome, 
                'cargo' => $e->cargo,
            ]);
        }
    }
}
