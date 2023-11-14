<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use stdClass;

class ClienteControladorController extends Controller
{

    private $clientes = [
        ['id' => 1, 'nome' => 'fulano'],
        ['id' => 2, 'nome' => 'ciclano'],
        ['id' => 3, 'nome' => 'beltrano'],
        ['id' => 4, 'nome' => 'cotrano'],
    ];

    public function __construct()
    {
        // dd($this->clientes);
        // Session::forget('clientes');

        $clientes = session('clientes');
        if (!isset($clientes))
            session(['clientes' => $this->clientes]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = session('clientes');
        $titulo = "Todos os clientes";
        // return view('clientes.index', compact('data'));
        // return view('clientes.index')->with('data', $data)->with('titulo',"titulo");
        return view('clientes.index', compact(['data', 'titulo']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = session('clientes');

        $id = (end($clientes)['id'] ?? 0) + 1 ;

        $novoCliente = ['id' => $id, 'nome' => $request->nome];
        array_push($clientes, $novoCliente);
        // $clientes[] =  $novoCliente;

        session(['clientes' => $clientes]);

        $data = $clientes;

        return view('clientes.index', compact('data'));
        // return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($data);
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $data = $clientes[$index];
        return view('clientes.info', compact('data'));
    }

    public function pesquisar(Request $r)
    {
        // dd($r->all());
        // $clientes = session('clientes');
        // $data = $clientes[$id - 1];
        // return view('clientes.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $data = $clientes[$index];
        return view('clientes.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        // dd($clientes);
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->nome;



        session(['clientes' => $clientes]);
        $data = $clientes;

        return view('clientes.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);

        $data = $clientes;

        return view('clientes.index', compact('data'));
    }

    private function getIndex($id, $clientes){
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;
    }

}
