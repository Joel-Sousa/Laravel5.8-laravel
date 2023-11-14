<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        echo '<h4>Lista de produtos</h4>';
        echo '<ul>';
        echo '<li>tst 1</li>';
        echo '<li>tst 2</li>';
        echo '<li>tst 3</li>';
        echo '<li>tst 4</li>';
        echo '<li>tst 5</li>';
        echo '</ul>';
    }
}
