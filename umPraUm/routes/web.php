<?php

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

use App\Models\Cliente;
use App\Models\Endereco;

Route::get('/clientes', function () {
    $cliente = new Cliente();
    $all = $cliente->with('endereco')->get();
    // $all = $cliente->all();

    
    foreach($all as $e){
        echo '<p> IdCliente: '.$e->idCliente.'</p>';
        echo '<p> Nome: '.$e->nome.'</p>';
        echo '<p> Telefone: '.$e->telefone.'</p>';
        echo '<p> Rua: '.$e->endereco->rua.'</p>';
        echo '<p> Bairro: '.$e->endereco->bairro.'</p>';
        echo '<p> Cidade: '.$e->endereco->cidade.'</p>';
        echo '<p> Uf: '.$e->endereco->uf.'</p>';
        echo '<p> Cep: '.$e->endereco->cep.'</p>';
        echo '<hr/>';
    }

    // return view('tst', compact('all'));
});

Route::get('/enderecos', function () {
    $endereco = new Endereco();
    $all = $endereco->all();

    foreach($all as $e){
        echo '<p> IdCliente: '.$e->idCliente.'</p>';
        echo '<p> Nome: '.$e->cliente->nome.'</p>';
        echo '<p> Telefone: '.$e->cliente->telefone.'</p>';
        echo '<p> Rua: '.$e->rua.'</p>';
        echo '<p> Numero: '.$e->numero.'</p>';
        echo '<p> Bairro: '.$e->bairro.'</p>';
        echo '<p> Cidade: '.$e->cidade.'</p>';
        echo '<p> Uf: '.$e->uf.'</p>';
        echo '<p> Cep: '.$e->cep.'</p>';
        echo '<hr/>';
    }

    

    // return view('tst', compact('all'));
});

Route::get('/inserir', function(){
    $c = new Cliente();
    $c->nome = 'jose';
    $c->telefone = '11 9999-9999';
    $c->save();

    $e = new Endereco();
    $e->rua = 'rua toto';
    $e->numero = 5400;
    $e->bairro = 'centro';
    $e->cidade = 'sao paulo';
    $e->uf = 'go';
    $e->cep = '44444';
    $c->endereco()->save($e);
    
    
    $c = new Cliente();
    $c->nome = 'jose1';
    $c->telefone = '11 9999-9999';
    $c->save();
    
    $e = new Endereco();
    $e->rua = 'rua toto1';
    $e->numero = 5400;
    $e->bairro = 'centro';
    $e->cidade = 'sao paulo';
    $e->uf = 'go';
    $e->cep = '3223';
    $c->endereco()->save($e);
});

Route::get('/clientes/json', function(){
    // $clientes = Cliente::all(); lazy loading
    // $clientes = Cliente::with('endereco')->get(); eager loading
    $clientes = Cliente::with('endereco')->get();
    return $clientes->toJson();
});

Route::get('/enderecos/json', function(){
    // $enderecos = Endereco::all();
    $enderecos = Endereco::with('cliente')->get();
    return $enderecos->toJson();
});