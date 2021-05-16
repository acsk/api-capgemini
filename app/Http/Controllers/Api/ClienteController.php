<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use App\Repositories\ClienteRepository;

class ClienteController extends Controller

{

    private $cliente;

    public function __construct(ClienteRepository $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request)
    {

        $clientes = $this->cliente->getClientes($request->nome);
      
        return $clientes;
    }

    public function store(ClienteRequest $request)
    {

        return  $this->cliente->store($request->all());
    }

    public function update(ClienteRequest $request, $id)
    {
    
        $cliente =  $this->cliente->edit($request->except(['id']), $id);
   
        return $cliente;
    }

    public function delete($id){

        $cliente = $this->cliente->delete($id);

        return $cliente;
    }
}
