<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoController extends Controller
{
    public function index(){
        echo '<h4>Lista de categorias</h4>';
        echo '<ul>';
        echo '<li>tst 11</li>';
        echo '<li>tst 22</li>';
        echo '<li>tst 33</li>';
        echo '<li>tst 44</li>';
        echo '<li>tst 55</li>';
        echo '</ul>';

        echo '<hr/>';

        if(Auth::check()){
            $user = Auth::user();
            echo '<h4>Voce esta logado!</h4>';
            echo '<p>'.$user->name.'</p>';
            echo '<p>'.$user->email.'</p>';
            echo '<p>'.$user->id.'</p>';
        }else{
            echo '<h4>Voce nao esta logado!</h4>';
        }
    }
}
