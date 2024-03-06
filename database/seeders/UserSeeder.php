<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Galan',
            'password' => 'galan',
            'email' => 'galan@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Pepe',
            'password' => 'pepe',
            'email' => 'pepe@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'password' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
    }
}
