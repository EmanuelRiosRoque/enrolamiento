<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'USER1',
            'email' => 'correo1@correo.com',
            'password' => bcrypt('12345678'),
            'n_empleado' => '8000001'
        ]);

        // Crear usuario 2
        User::create([
            'name' => 'USER2',
            'email' => 'correo2@correo.com',
            'password' => bcrypt('12345678'),
            'n_empleado' => '8000002'
        ]);

        // Crear usuario 3
        User::create([
            'name' => 'USER3',
            'email' => 'correo3@correo.com',
            'password' => bcrypt('12345678'),
            'n_empleado' => '8000003'
        ]);

        // Crear usuario 4
        User::create([
            'name' => 'USER4',
            'email' => 'correo4@correo.com',
            'password' => bcrypt('12345678'),
            'n_empleado' => '8000004'
        ]);
    }
}
