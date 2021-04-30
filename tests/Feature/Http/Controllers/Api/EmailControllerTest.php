<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Http\Resources\ApiEmailCollection;
use App\Models\Email;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertCount;

class EmailControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_obtener_2_correos_por_defecto()
    {
        $emails = new ApiEmailCollection(Email::factory(10)->create());
        
        $emails = $emails->filter(function($value, $key){
            return $key < 2;
        });

        $emails = $emails->map(function($item, $key){
            return [
                'created_at' => $item->created_at->format('j \d\e F \d\e\l Y H:i'),
                'receiver' => $item->receiver,
                'sender' => $item->user->email,
                'state' => $item->state,
                'subject' => $item->subject
            ];
        });

        $emails = $emails->toArray();

        $this->json('GET','api/emails')
        ->assertStatus(200)
        ->assertJsonFragment(['data' => $emails])
        ;
        
    }

    public function test_obtener_la_cantidad_deseada_de_correos_si_no_es_mayor_al_total()
    {
        $total = 10;
        $emails = new ApiEmailCollection(Email::factory($total)->create());
        
        $emails = $emails->map(function($item, $key){
            return [
                'created_at' => $item->created_at->format('j \d\e F \d\e\l Y H:i'),
                'receiver' => $item->receiver,
                'sender' => $item->user->email,
                'state' => $item->state,
                'subject' => $item->subject
            ];
        });

        $emails = $emails->toArray();

        $this->json('GET',"api/emails?size={$total}")
        ->assertStatus(200)
        ->assertJsonFragment(['data' => $emails])
        ;
        
    }
}
