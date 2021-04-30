<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/json/cities.json');
        $json = json_decode($json);
        $cities =json_decode(json_encode($json->cities), true);

        $chunks = array_chunk($cities, 5000);

        foreach ($chunks as $city) {
            City::insert($city);
        }
    }
}
