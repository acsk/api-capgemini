<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ContaRepository;

class ContaController extends Controller
{
  
   private $conta;

   public function __construct(ContaRepository $conta)
   {
       $this->conta = $conta;
   }
   public function all(){

    return $this->conta->all();
   }
   public function show($numeroConta)
   {
    $conta = $this->conta->show($numeroConta);
    
    return $conta;
   }

   public function sacar($numConta, $valor){

    return $this->conta->sacar($numConta, $valor);
   }

   public function depositar($numConta, $valor){

    return $this->conta->depositar($numConta, $valor);
   }

   
}
