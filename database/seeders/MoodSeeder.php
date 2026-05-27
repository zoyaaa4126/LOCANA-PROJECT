<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moods = [
            ['id' => 1, 'nama' => 'Chill', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama' => 'Fancy', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama' => 'Keluarga', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nama' => 'Romantis', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nama' => 'Petualangan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'nama' => 'Produktif', 'created_at' => now(), 'updated_at' => now()],
        ];
        
        DB::table('moods')->insert($moods);
    }
}