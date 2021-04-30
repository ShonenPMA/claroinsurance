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

        $states =json_decode(json_encode($json->states), true);

        $chunks = array_chunk($states, 5000);

        foreach ($chunks as $state) {
            State::insert($state);
        }
    }
}
