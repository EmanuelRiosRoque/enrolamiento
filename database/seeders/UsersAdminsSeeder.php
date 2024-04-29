<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UsersAdmin = [
            ['name' => 'EMANUEL', 'n_empleado' => 8009933, 'email' => null,'password' => '12345678'],

        ];


        foreach ($UsersAdmin as $userData) {
        User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'n_empleado' => $userData['n_empleado'],
            'password' => bcrypt($userData['password']), // Hashing the password
        ]);
    }

    }
}
