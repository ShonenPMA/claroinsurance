<?php

namespace Tests\Feature\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_muestra_mensaje_cuando_no_se_han_registrado_correos()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
        ->get('/emails')
        ->assertStatus(200)
        ->assertSee('No hay correos registrados');
    }

    public function test_muestra_boton_para_registar_emails()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
        ->get('/emails')
        ->assertStatus(200)
        ->assertSee('Registrar Correo');
    }

    public function test__redirecciona_a_visitantes()
    {
        $this->get('/emails')
        ->assertRedirect('login')
        ;
    }

}
