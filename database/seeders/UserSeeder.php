<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
           'surname' => 'user',
           'name' => 'user',
           'login' => 'user',
           'password' => 'user',
           'api_token' => 1,
           'role_id' => 1,
        ]);
        User::create([
           'surname' => 'manager',
           'name' => 'manager',
           'login' => 'manager',
           'password' => 'manager',
            'api_token' => 2,
           'role_id' => 2,
        ]);
        User::create([
           'surname' => 'admin',
           'name' => 'admin',
           'login' => 'admin',
           'password' => 'admin',
            'api_token' => 3,
           'role_id' => 3,
        ]);
    }
}
