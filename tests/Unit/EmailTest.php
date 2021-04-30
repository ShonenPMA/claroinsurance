<?php

namespace Tests\Unit;

use App\Models\Email;
use App\Models\User;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_un_email_pertenece_a_un_usuario()
    {     
        $email = Email::factory()->create();

        $this->assertInstanceOf(User::class, $email->user);
    }
}
