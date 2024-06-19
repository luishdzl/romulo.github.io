<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Luis Jose Hernandez',
            'email' => 'luisjose@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        
        User::factory(9)->create();
    }
}
