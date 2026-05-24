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
            ['id' => 1, 'nama' => 'Cafe', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama' => 'Restaurant', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama' => 'Bakery', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nama' => 'Live Music', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nama' => 'Indoor', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'nama' => 'Outdoor', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('kategoris')->insert($kategoris); 
    }
}