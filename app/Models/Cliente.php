<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = ['nome','identidade'];

    public function pesquisaNome($name = null)
    {

        if (!$name)
            return $this->get();

        return $this->where('nome', 'LIKE', "%{$name}%")->get();
    }

    public function contas(){

        return $this->hasMany(Conta::class);
    }
}
