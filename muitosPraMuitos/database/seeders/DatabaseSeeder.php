<?php

namespace Database\Seeders;

use App\Models\Alocacao;
use App\Models\Desenvolvedor;
use App\Models\Projeto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DesenvolvedoresSeeder::class,
            ProjetosSeeder::class,
            AlocacoesSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
