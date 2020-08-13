<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mensagem;
use Faker\Generator as Faker;

$factory->define(Mensagem::class, function (Faker $faker) {
    return [
        'nome' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'mensagem' => $faker->text($maxNbChars = 200)  
    ];
});
