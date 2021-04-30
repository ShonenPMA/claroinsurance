<?php

namespace Tests\Feature\Mail;

use App\Mail\BasicMail;
use App\Models\Email;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class BasicMailTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_el_correo_basico_envia_el_contenido_que_recibe()
    {
        $content = '<h1>Hola Mundo</h1>';

        $mailable = new BasicMail($content);

        $mailable->assertSeeInHtml('Hola Mundo');

    }


    public function test_se_envia_el_correo()
    {
        Mail::fake();

        $email = Email::factory()->create();

        Mail::to($email->receiver)->send(new BasicMail($email->content));
        
        Mail::assertSent(BasicMail::class);

    }
}
