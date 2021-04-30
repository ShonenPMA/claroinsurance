<?php

namespace Tests\Unit;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_una_ciudad_tiene_muchos_usuarios()
    {
        $city = City::where('id', 414692)->first();

        $this->assertInstanceOf(Collection::class, $city->users);
    }

    public function test_una_ciudad_pertenece_a_un_estado()
    {
        $city = City::where('id', 414692)->first();

        $this->assertInstanceOf(State::class, $city->state);
    }
}
