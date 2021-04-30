<?php

namespace Tests\Feature\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_muestra_mensaje_cuando_no_se_han_registrado_usuarios()
    {
        $user = User::where('role','admin')->first();
        $this->actingAs($user)
        ->get('/users')
        ->assertStatus(200)
        ->assertSee('No hay usuarios registrados');
    }

    public function test__redirecciona_a_visitantes()
    {
        $this->get('/users')
        ->assertRedirect('login')
        ;
    }

    public function test_solo_pueden_acceder_usuarios_con_role_admin(){
        $user = User::factory()->create();

        $this->actingAs($user)
        ->get('/users')
        ->assertForbidden();
    }


    public function test_muestra_listado_de_usuarios_registrados()
    {
        User::factory(10)->create();
        $user = User::where('role','admin')->first();
        $this->actingAs($user)
        ->get('/users')
        ->assertStatus(Response::HTTP_OK)
        ->assertSee('Nombre')
        ->assertSee('Cédula')
        ->assertSee('Correo')
        ->assertSee('Edad')
        ;
    }

    public function test_se_puede_editar_usuario()
    {
        $user = User::factory()->create();
        $admin = User::where('role','admin')->first();
        $data = [
            'email' => $user->email,
            'name' => $this->faker->name,
            'phone' => '123456789'
        ];

        $this->actingAs($admin)
        ->json('PUT','users',$data)
        ->assertStatus(Response::HTTP_OK);
    }
    public function test_se_puede_eliminar_usuario()
    {
        $user = User::factory()->create();
        $admin = User::where('role','admin')->first();


        $this->actingAs($admin)
        ->json('GET',"users/{$user->id}")
        ->assertStatus(Response::HTTP_FOUND);
    }
}
