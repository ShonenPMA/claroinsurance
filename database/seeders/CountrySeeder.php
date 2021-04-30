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
        $countries = $json->countries;
        
        foreach ($countries as $country) {
            Country::insert([
                'id' => $country->id,
                'name' => $country->name
            ]);
        }
        
    }
}
