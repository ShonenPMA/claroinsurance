<?php

namespace Tests\Feature\Console\Commands;

use App\Models\Email;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendEmailsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_envia_correo()
    {
        Email::factory()->create();
        $this->artisan('mail:send')
        ->expectsOutput('Enviado exitosamente');
    }

    public function test_cambia_el_estado_a_enviado_despues_de_enviar_el_correo()
    {
        $email = Email::factory()->create();
        $this->artisan('mail:send')
        ->expectsOutput('Enviado exitosamente');

        $this->assertDatabaseHas('emails',[
            'subject' => $email->subject,
            'receiver' => $email->receiver,
            'state' => 'ENVIADO'
        ]);
    }
    public function test_cambia_el_estado_a_fallo_despues_de_intentar_enviar_el_correo()
    {
        $email = Email::factory()->create([
            'receiver' => 'random'
        ]);
        $this->artisan('mail:send')
        ->expectsOutput('Falló');

        $this->assertDatabaseHas('emails',[
            'subject' => $email->subject,
            'receiver' => $email->receiver,
            'state' => 'FALLO'
        ]);
    }
    
}
