<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User:truncate();
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'superAdmin@proyectoFinal.com',
            'password' => Hash::make('superAdminProyectoFinal'),
            'role' => 'SUPER_ADMIN',
        ]);
    }
}
