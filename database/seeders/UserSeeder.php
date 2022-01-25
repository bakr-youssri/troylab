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
        if(!User::first()){
            User::create([
                'name' => 'Admin',
                'email' => 'admin@troylab.com',
                'password' => bcrypt(12345678),
            ]);
        }
    }
}
