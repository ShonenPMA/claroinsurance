<?php

namespace Tests\Unit;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class CountryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_un_estado_pertenece_a_un_pais()
    {
        $country = Country::first();

        $this->assertInstanceOf(Collection::class, $country->states);
    }
}
