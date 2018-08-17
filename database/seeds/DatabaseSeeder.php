<?php

use Illuminate\Database\Seeder;
use App\Models\Produto;
use App\Models\Disputa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Produto::class, 1)->create()->each(function ($produto) {
            $produto->disputas()->saveMany(factory(Disputa::class, 3)->make());
        });

        factory(Produto::class, 2)->create()->each(function ($produto) {
            $produto->disputas()->saveMany(factory(Disputa::class, 4)->make());
        });

        factory(Produto::class, 1)->create()->each(function ($produto) {
            $produto->disputas()->saveMany(factory(Disputa::class, 7)->make());
        });

        factory(Produto::class, 1)->create()->each(function ($produto) {
            $produto->disputas()->saveMany(factory(Disputa::class, 15)->make());
        });

        factory(Produto::class, 2)->create()->each(function ($produto) {
            $produto->disputas()->saveMany(factory(Disputa::class, 5)->make());
        });

        factory(Produto::class, 3)->create()->each(function ($produto) {
            $produto->disputas()->saveMany(factory(Disputa::class, 3)->make());
        });

        factory(Produto::class, 8)->create()->each(function ($produto) {
            $produto->disputas()->saveMany(factory(Disputa::class, 1)->make());
        });

        factory(Produto::class, 11)->create()->each(function ($produto) {
            $produto->disputas()->saveMany(factory(Disputa::class, 6)->make());
        });
    }
}
