<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produto;
use App\Categoria;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    $categorias = Categoria::count();
    
    return [
        'ref' => $faker->lexify('???-???'),
        'nome' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'descricao' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'preco' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 50),
        'unidadeMedida' => $faker->word,
        'categoria_id' => $faker->numberBetween($min = 1, $max = ($categorias)),
    ];
});
