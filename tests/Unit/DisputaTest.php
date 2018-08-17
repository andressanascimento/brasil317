<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Disputa;

class DisputaTest extends TestCase
{

    /** @test */
    public function criar_disputa()
    {
        $disputa = factory(Disputa::class)->create();
        $found = Disputa::findOrFail($disputa->id);

        $this->assertInstanceOf(Disputa::class, $found);
        $this->assertEquals($found->preco, $disputa->preco);
        $this->assertEquals($found->preco_concorrente, $disputa->preco_concorrente);
        $this->assertEquals($found->vitoria, $disputa->vitoria);
    }
}
