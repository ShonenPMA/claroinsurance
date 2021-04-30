<?php

namespace Tests\Feature\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
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

    public function test_redirecciona_a_visitantes_cuando_intentan_acceder_al_listado()
    {
        $this->get('/emails')
        ->assertRedirect('login')
        ;
    }

    public function test_puede_ver_los_inputs_para_crear_correo(){
        $user = User::factory()->create();
        $this->actingAs($user)
        ->get('/emails/create')
        ->assertStatus(200)
        ->assertSee('Destinatario')
        ->assertSee('Asunto')
        ->assertSee('Mensaje')
        ;
    }

    public function test_redirecciona_a_visitantes_cuando_intentant_acceder_a_crear_correo()
    {
        $this->get('/emails/create')
        ->assertRedirect('login')
        ;
    }


    public function test_puede_crear_correo(){

        $user = User::factory()->create();
        $data = [
            'receiver' =>'test@test.com',
            'subject' => $this->faker->text(90),
            'content' => $this->faker->text,
            'user_id' => $user->id
        ];

        $this->actingAs($user)
        ->json('POST','/emails/create', $data)
        ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseCount('emails',1);
        $this->assertDatabaseHas('emails', [
            'receiver' => $data['receiver'],
            'subject' => $data['subject'],
            'user_id' => $data['user_id']
        ]);


    }

}
