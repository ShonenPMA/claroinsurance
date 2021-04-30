<?php

namespace Tests\Feature\Http\Controllers\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_muestra_inputs_en_la_vista()
    {
        $this->get('/registro')
        ->assertSee('Correo')
        ->assertSee('Clave')
        ->assertSee('Confirmación de la clave')
        ->assertSee('Nombre')
        ->assertSee('Celular')
        ->assertSee('Cédula')
        ->assertSee('Fecha de nacimiento')
        ->assertSee('país')
        ->assertSee('estado')
        ->assertSee('ciudad')
        ->assertSee('Registrarme')
        ->assertStatus(200);
    }

    public function test_puede_registrar_usuarios()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'card' => $this->faker->text(11),
            'birth_date' => '05-02-2000 01:00:00',
            'password' => 'adminTest*123',
            'password_confirmation' => 'adminTest*123',
            'city' => 414692
        ];

        $this->json('POST','registro/save', $data)
        ->assertJsonFragment([
            'name' => $data['name'],
            'email' => $data['email'],
            'card' => $data['card'],
            'birth_date' => $data['birth_date'],
            'id_city' => $data['city'],
        ]);

        $this->assertDatabaseCount('users', 2);
    }
}
