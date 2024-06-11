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
            'name' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);
    }
}
