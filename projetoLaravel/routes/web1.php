<?php

use App\Http\Controllers\ClienteControladorController;
use App\Http\Controllers\MeuControladorController;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $r) {
    dd($r);
    // var_dump($r->headers);

    return view('welcome');
});

Route::get('produtos', [MeuControladorController::class, 'getProduto']);
Route::get('nome', [MeuControladorController::class, 'getNome']);
Route::get('idade', [MeuControladorController::class, 'getIdade']);
Route::get('multiplicar', [MeuControladorController::class, 'getMultiplicar']);

// Teste de rota
Route::get('/tst', function(){
    return 'tst';
});

// Rota com parametro
Route::get('/tst/{nome}', function($nome){
    return 'nome: '.$nome;
});

// Rota com dois parametros
Route::get('/tst/{nome}/{sobrenome}', function($nome, $sobrenome){
    return 'nome: '.$nome. ' '. $sobrenome;
});

// Rota com parametro opcinal {nome?}
Route::get('/tst1/{nome?}', function($nome = null){
    if(isset($nome))
        return 'nome: '.$nome;
    else
        return 'Voce nao digitou nenhum nome';
});

// Rota com validacao de parametro
Route::get('/tst1/{nome}/{n}', function($nome, $n){
    for($i=0; $i<$n; $i++)
    echo 'nome: '.$nome.'<br>';
})->where('nome', '[A-Za-z]+')
->where('n', '[0-9]+');

// Agrupamento de rotas
// e dando nome dinamico para as rotas
Route::prefix('/app')->group(function(){

    Route::get('/', function(){
        return view('app');
    })->name('app');

    Route::get('/user', function(){
        return view('user');
    })->name('app.user');

    Route::get('/profile', function(){
        return view('profile');
    })->name('app.profile');
});

Route::get('/produtos', function(){
    return 'produtos';
})->name('meusprodutos');

// Redirecionamento de rotas 1
Route::redirect('todosprodutos1', 'produtos', 301);

// Redirecionamento de rotas 2
Route::get('todosprodutos2', function(){
    return redirect()->route('meusprodutos');
});

//////////////////////////////////////

Route::post('/requisicoes', function(Request $request){
    return 'post';
});

Route::put('/requisicoes', function(Request $request){
    return 'put';
});

Route::patch('/requisicoes', function(Request $request){
    return 'patch';
});

Route::delete('/requisicoes', function(Request $request){
    return 'delete';
});

Route::options('/requisicoes', function(Request $request){
    return 'options';
});

Route::get('/requisicoes', function(Request $request){
    return 'get';
});
