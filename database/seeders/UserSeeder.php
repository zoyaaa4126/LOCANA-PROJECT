<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id'       => 1,
            'username' => 'admin_locana',
            'nama'     => 'Admin Locana',
            'email'    => 'admin@locana.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);

        User::create([
            'id'       => 2,
            'username' => 'budi_santoso',
            'nama'     => 'Budi Santoso',
            'email'    => 'budi@gmail.com',
            'password' => Hash::make('password123'),
            'role'     => 'user',
        ]);
    }
}