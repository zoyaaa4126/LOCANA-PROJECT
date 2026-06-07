<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            ['id' => 1, 'nama' => 'Cafe'],
            ['id' => 2, 'nama' => 'Restaurant'],
            ['id' => 3, 'nama' => 'Bakery'],
            ['id' => 4, 'nama' => 'Live Music'],
            ['id' => 5, 'nama' => 'Indoor'],
            ['id' => 6, 'nama' => 'Outdoor'],
            ['id' => 7, 'nama' => 'Mall'],
            ['id' => 8, 'nama' => 'Park'],
        ];

        DB::table('kategoris')->insert($kategoris); 
    }
}