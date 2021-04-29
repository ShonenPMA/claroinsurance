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
    public function test_display_message_in_welcome_view()
    {
        $this->get('/')
        ->assertSee('Bienvenido(a)')
        ->assertStatus(200);
    }
}
