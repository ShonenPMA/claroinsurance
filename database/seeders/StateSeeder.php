<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/json/states.json');
        $json = json_decode($json);
        $states = $json->states;

        foreach ($states as $state) {
            State::insert([
                'id' => $state->id,
                'name' => $state->name,
                'id_country' => $state->id_country
            ]);
        }
    }
}
