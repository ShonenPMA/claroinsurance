<?php

namespace Tests\Unit;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_un_usuario_pertenece_a_una_ciudad()
    {     
        $user = User::factory()->create();

        $this->assertInstanceOf(City::class, $user->city);
    }

    public function test_un_usuario_tiene_muchos_correos()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(Collection::class, $user->emails);
    }
}
