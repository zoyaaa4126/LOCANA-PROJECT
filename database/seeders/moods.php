<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class moods extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $moods = [
            [
                'nama' => 'Chill'
            ],
            [
                'nama' => 'Fancy'
            ],
            [
                'nama' => 'Keluarga'
            ],
            [
                'nama' => 'Petualangan'
            ],
            [
                'nama' => 'Produktif'
            ],
            [
                'nama' => 'Romantis'
            ]
        ];
        DB::table('moods')->insert($moods);
    }
}
