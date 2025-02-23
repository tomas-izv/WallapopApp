<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}