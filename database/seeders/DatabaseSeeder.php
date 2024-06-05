<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    function run()
    {
        // Membuat role admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('$2y$10$55DNxILkwBB2EuBgQKWJwOJWiG1sY8Eceo1zY5jTes.uka1Llnj9i'), 
            'role' => 'admin',
        ]);

        // Membuat role user
        User::create([
            'name' => 'budi',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('$2y$10$55DNxILkwBB2EuBgQKWJwOJWiG1sY8Eceo1zY5jTes.uka1Llnj9i'), 
            'role' => 'user',
        ]);
    }
}
