<?php

namespace Tests\Feature\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_display_welcome_user_register()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
        ->get('/home')
        ->assertStatus(200)
        ->assertSee("Bienvenido(a) {$user->name}");
    }

    public function test_redirect_unauthenticated()
    {
        $this->get('/home')
        ->assertRedirect('login');
    }
}
