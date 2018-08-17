<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Disputa::class, function (Faker $faker) {
    return [
        'preco' => $faker->randomFloat(2,0,8),
        'preco_concorrente' => $faker->randomFloat(2,0,8),
        'vitoria' => $faker->randomElement([0,1,null]),
        'status' => $faker->randomElement(["aberto","encerrado"]),
        'produto_id' => factory(App\Models\Produto::class)->create()->id,
    ];
});
