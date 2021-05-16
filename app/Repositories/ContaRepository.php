<?php

namespace App\Repositories;

use App\Models\Conta;

class ContaRepository
{

    protected $conta;

    public function __construct(Conta $conta)
    {
        $this->conta = $conta;
    }

    public function show($numeroConta)
    {
        $conta = $this->conta->with('cliente')->where('numero', '=', $numeroConta)->first();
        if (!$conta)
            return response()->json(['message' => 'Nenhuma conta encontrada!', 'error' => false], 404);
        return response()->json($conta);
    }
    public function all()
    {
        return $this->conta->all();
    }
    public function getBalance($id)
    {

        return $this->conta->where('id', $id)
            ->select('saldo')
            ->get();
    }

    public function sacar($numeroConta, $valor)
    {
        $conta = $this->conta->with('cliente')->where('numero', '=', $numeroConta)->first();
        if (!$conta)
            return response()->json(['message' => 'Nenhuma conta encontrada!', 'error' => false], 404);

        if ($valor <= 0 || !isset($valor))
            return response()->json(['message' => 'O valor não por ser menor ou igual ZERO!', 'error' => false], 404);

        if ($conta->saldo < $valor) {
            return response()->json(['message' => 'Seu saldo é insuficiente, tente outro valor,', 'error' => false], 404);
        } else {

            $conta->update([
                'saldo' => $conta->saldo - $valor
            ]);

            return response()->json($conta);
        }
    }

    public function depositar($numeroConta, $valor)
    {
        $conta = $this->conta->with('cliente')->where('numero', '=', $numeroConta)->first();
        if (!$conta)
            return response()->json(['message' => 'Nenhuma conta encontrada!', 'error' => false], 404);

        if ($valor <= 0 || !isset($valor)) {
            return response()->json(['message' => 'O valor não por ser menor ou igual ZERO!', 'error' => false], 404);
        } else {

            $conta->update([
                'saldo' => $conta->saldo + $valor
            ]);

            return response()->json($conta);
        }
    }
}
