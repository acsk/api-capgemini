<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conta extends Model
{

    protected $fillable = ['saldo'];

    public function cliente()
    {

        return $this->belongsTo(Cliente::class);
    }

    public function getSaldo()
    {
        return $this->saldo;
    }
}
