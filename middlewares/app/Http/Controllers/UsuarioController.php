<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
   
    
    public function index(){
        return '<h3>Lista de usuarios</h3>'.
                '<ul>
                    <li>Joao</li>
                    <li>Maria</li>
                    <li>Jose</li>
                    <li>Marcos</li>
                </ul>';
    }
}
