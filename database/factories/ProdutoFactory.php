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

$factory->define(App\Models\Produto::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'marca_id' => factory(App\Models\Marca::class)->create()->id,
        'fabricante_id' => factory(App\Models\Fabricante::class)->create()->id,
    ];
});
