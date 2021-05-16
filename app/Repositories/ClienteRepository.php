<?php

namespace App\Repositories;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Support\Facades\Request;

class ClienteRepository
{

    protected $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function getClientes($nome = null)
    {

        return $this->cliente->pesquisaNome($nome);
    }

    public function pesquisar($id)
    {

        return $this->cliente->find($id);
    }


    public function pesquisarPor($coluna, $termo)
    {

        return $this->cliente->where($coluna, $termo)->get();
    }

    public function store($request)
    {

        $cliente =  $this->cliente->create($request);
        return response()->json($cliente);
    }

    public function edit($request, $id)
    {

        $cliente = $this->cliente->find($id);
        if (!$cliente)
            return response()->json(['message' => 'Nenhum cliente encontrado!', 'error' => false], 404);

        $cliente->update($request);

        return response()->json($cliente);
    }

    public function delete($id)
    {
        $cliente = $this->cliente->find($id);

        if (!$cliente)
            return  response()->json(['message' => 'Nenhum cliente encontrado para deletar!', 'error' => false], 404);

        $cliente->delete();

        return  response()->json(['message' => 'Cliente deletado com sucesso!', 'success' => true], 404);
    }
}
