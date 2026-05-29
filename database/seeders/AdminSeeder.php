<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $path = null;
        User::create([
            'nama'     => 'Locana',
            'username' => 'adminlocana',
            'email'    => 'adminlocana@gmail.com',
            'password' => bcrypt('locana1234'),
            'role'     => 'admin',
            'fotoProfile' => $path,
        ]);
    }
}