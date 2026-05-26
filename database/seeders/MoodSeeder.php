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
            ['id' => 1, 'nama' => 'Chill'],
            ['id' => 2, 'nama' => 'Fancy'],
            ['id' => 3, 'nama' => 'Keluarga'],
            ['id' => 4, 'nama' => 'Romantis'],
            ['id' => 5, 'nama' => 'Petualangan'],
            ['id' => 6, 'nama' => 'Produktif'],
        ];
        
        DB::table('moods')->insert($moods);
    }
}