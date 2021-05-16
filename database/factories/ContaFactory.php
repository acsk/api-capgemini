<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Cliente;
use App\Models\Conta;
use Faker\Generator as Faker;

$factory->define(Conta::class, function (Faker $faker) {
    return [
        'numero' => $faker->numerify('###'),
        'agencia' => 1,
        'saldo' => $faker->numerify('####'),
        'cliente_id' => function () {
            return factory(Cliente::class)->create()->id;
        }
    ];
});
