<?php

namespace Tests\Feature\Http\Controllers\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_muestra_mensaje_de_bienvenida()
    {
        $this->get('/')
        ->assertSee('Bienvenido(a)')
        ->assertStatus(200);
    }
}
