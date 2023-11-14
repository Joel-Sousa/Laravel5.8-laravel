<?php

use App\Models\Desenvolvedor;
use App\Models\Projeto;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desenvolvedorProjeto', function () {
    
    $desenvolvedores = Desenvolvedor::with('projeto')->get();

    // return $desenvolvedores;
    
    foreach($desenvolvedores as $e){
        echo '<p> Nome:'.$e->nome.'</p>';
        echo '<p> Cargo:'.$e->cargo.'</p>';
        // echo '<p> Projeto:'.$e->projeto.'</p>';
        if(count($e->projeto) > 0){
            foreach($e->projeto as $e1){
                echo '<p> Nome projeto: '.$e1->nome.'</p>';
                echo '<p> Estimativa de horas: '.$e1->estimativaHoras.'</p>';
                echo '<p> Horas Semanais: '.$e1->pivot->horasSemanais.'</p>';
            }
        }
        echo '<hr/>';
        
    }

});

Route::get('/projetoDesenvolvedor', function () {
    
    $projetos = Projeto::with('desenvolvedor')->get();

    // return $projetos;
    
    foreach($projetos as $e){
        echo '<p> Nome projeto:'.$e->nome.'</p>';
        echo '<p> Estimativas de horas:'.$e->estimativaHoras.'</p>';
        // echo '<p> Projeto:'.$e->projeto.'</p>';
        if(count($e->desenvolvedor) > 0){
            foreach($e->desenvolvedor as $e1){
                echo '<p> Nome: '.$e1->nome.'</p>';
                echo '<p> Cargo: '.$e1->cargo.'</p>';
                echo '<p> Horas Semanais: '.$e1->pivot->horasSemanais.'</p>';
            }
        }
        echo '<hr/>';
        
    }
    
});
Route::get('/alocar', function () {
    $projeto = Projeto::find(4);
    if(isset($projeto)){
        // $projeto->desenvolvedor()->attach(1, ['horasSemanais' => 50]);
        var_dump($projeto->desenvolvedor());

        // $projeto->desenvolvedor()->attach([
        //     2 => ['horasSemanais' => 50],
        //     3 => ['horasSemanais' => 50],
        // ]);

    }
});

