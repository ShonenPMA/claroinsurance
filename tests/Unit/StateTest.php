<?php

namespace Tests\Unit;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class StateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_un_estado_tiene_muchas_ciudades()
    {
        $state = State::first();

        $this->assertInstanceOf(Collection::class, $state->cities);
    }
    public function test_un_estado_pertenece_a_un_pais()
    {
        $state = State::first();

        $this->assertInstanceOf(Country::class, $state->country);
    }
}
