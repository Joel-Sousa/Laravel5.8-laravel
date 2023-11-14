<?php

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/categorias', function () {
    $categorias = Categoria::all();
    if (count($categorias) === 0) {
        echo "Nao tem categoria";
    } else {
        echo "<table border=1>";
        echo "<tr>";
        echo "<td>" . 'Id' . "</td>";
        echo "<td>" . 'Nome' . "</td>";
        echo "</tr>";
        foreach ($categorias as $e) {
            echo "<tr>";
            echo "<td>" . $e->idCategoria . "</td>";
            echo "<td>" . $e->nome . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
});

Route::get('/produtos', function () {
    $produtos = Produto::all();
    if (count($produtos) === 0) {
        echo "Nao tem categoria";
    } else {
        echo "<table border=1>";
        echo "<tr>";
        echo "<td>" . 'Id' . "</td>";
        echo "<td>" . 'Nome' . "</td>";
        echo "<td>" . 'Preco' . "</td>";
        echo "<td>" . 'Estoque' . "</td>";
        echo "<td>" . 'idCategoria' . "</td>";
        echo "</tr>";
        foreach ($produtos as $e) {
            echo "<tr>";
            echo "<td>" . $e->idProduto . "</td>";
            echo "<td>" . $e->nome . "</td>";
            echo "<td>" . $e->preco . "</td>";
            echo "<td>" . $e->estoque . "</td>";
            echo "<td>" . $e->categoria->nome . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
});

Route::get('/categoriasProdutos', function () {
    $categorias = Categoria::all();
    if (count($categorias) === 0) {
        echo "Nao tem categoria";
    } else {
        foreach ($categorias as $e) {
            echo "<p>" . $e->idCategoria . $e->nome ."</p>";
            $produtos = $e->produto;
            if(count($produtos) > 0){
                echo "<ul>";
                foreach($produtos as $e1){
                    echo "<li>".$e1->nome."</li>";
                }
                echo "</ul>";
            }
        }
        echo "</table>";
    }
});


Route::get('/categoriasProdutos/json', function () {
    $categorias = Categoria::with('produto')->get();

    return $categorias->all();
});


Route::get('/adicionarProduto', function () {
    $categoria = Categoria::find(1);
    $produto = new Produto();
    $produto->nome = 'Meu novo produto';
    $produto->estoque = 10;
    $produto->preco = 100;
    $produto->categoria()->associate($categoria);
    $produto->save();
    return $produto->toJson();

});

Route::get('/desacossiarProduto', function () {
    // $categoria = Categoria::find(1);
    $produto =  Produto::find(7);
    if(isset($produto)){
        $produto->categoria()->dissociate();
        return $produto->toJson();

    }
    return '';
});

Route::get('/adicionarProduto/{categoria}', function ($idCategoria) {
    $categoria = Categoria::with('produto')->find($idCategoria);
    
    $produto = new Produto();
    $produto->nome = 'Meu novo produto2';
    $produto->estoque = 20;
    $produto->preco = 200;

    if(isset($categoria)){
        $categoria->produto()->save($produto);
    }

    $categoria->load('produto');

    return $categoria->toJson();

});