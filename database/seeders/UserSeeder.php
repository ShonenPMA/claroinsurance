<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'role' => 'admin',
            'email' => 'admin@claroinsurance.com',
            'card' => '12345678901',
            'birth_date' => '01/01/1990',
            'password' => bcrypt('admin')
        ]);
    }
}
