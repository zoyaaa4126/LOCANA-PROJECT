<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'username' => 'alya_atmin',
                'nama' => 'alya',
                'email' => 'anandaalya954@gmail.com',
                'password' => 'alyaatmin_12',
                'fotoProfile' => null,
                'role' => 'admin',
            ]
        ];
        
        foreach ($users as $user) {
            DB::table('users')->insert(array_merge($user, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}