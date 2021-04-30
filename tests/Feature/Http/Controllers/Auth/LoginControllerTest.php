<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_muestra_los_inputs_en_la_vista()
    {
        $this->get('/login')
        ->assertSee('Correo')
        ->assertSee('Clave')
        ->assertStatus(200);
    }

    public function test_puede_iniciar_sesion()
    {
        $user = User::factory()->create();
        $data = [
            'email' => $user->email,
            'password' => 'passworD*123'
        ];

        $this->json('POST','login', $data)
        ->assertStatus(Response::HTTP_OK);

    }
}
