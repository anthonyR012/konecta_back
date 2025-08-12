<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => 'Admin12345!', // se hashea por el cast 'password' => 'hashed'
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'agent@example.com'],
            [
                'name' => 'Agente',
                'password' => 'Agent12345!',
                'role' => 'agent',
            ]
        );
    }
}
