<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/json/countries.json');
        $json = json_decode($json);

        $countries =json_decode(json_encode($json->countries), true);

        $chunks = array_chunk($countries, 5000);

        foreach ($chunks as $country) {
            Country::insert($country);
        }
        
    }
}
