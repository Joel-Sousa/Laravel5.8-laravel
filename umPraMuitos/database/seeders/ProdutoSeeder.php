<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create(['nome' => 'Camisa', 'preco' => 100, 'estoque' => 4, 'idCategoria' => 1]);
        Produto::create(['nome' => 'Camisa1', 'preco' => 200, 'estoque' => 5, 'idCategoria' => 1]);
        Produto::create(['nome' => 'Lapis', 'preco' => 10, 'estoque' => 5, 'idCategoria' => 2]);
        Produto::create(['nome' => 'Lapis1', 'preco' => 20, 'estoque' => 6, 'idCategoria' => 2]);
        Produto::create(['nome' => 'Uno', 'preco' => 400, 'estoque' => 2, 'idCategoria' => 3]);
        Produto::create(['nome' => 'Uno1', 'preco' => 500, 'estoque' => 3, 'idCategoria' => 3]);
    }
}
