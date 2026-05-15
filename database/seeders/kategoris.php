<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoris extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kategoris = [
            [
                'nama' => 'Cafe'
            ],
            [
                'nama' => 'Restaurant'
            ],
            [
                'nama' => 'Bakery'
            ],
            [
                'nama' => 'Live Music'
            ],
            [
                'nama' => 'Indoor'
            ],
            [
                'nama' => 'Outdoor'
            ]
        ];
         DB::table('kategoris')->insert($kategoris);
    }
}
