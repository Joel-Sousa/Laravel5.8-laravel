<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControladorController extends Controller
{
    public function __construct()
    {
        
    }
    public function getProduto(Request $r)
    {
        // dd($r);
        return 'produtos';
    }


    public function getNome(Request $r)
    {
        // dd($r);
        return $r->nome;
    }

    public function getIdade(Request $r)
    {
        return $r->idade;
    }

    public function getMultiplicar(Request $r)
    {
        return $r->numero1 * $r->numero2;
    }
}
