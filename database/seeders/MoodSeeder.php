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
            [
                'id' => 1,
                'nama' => 'Chill',
                'deskripsi' => 'Suasana santai untuk melepas penat dan menikmati waktu luang.',
                'icons' => 'Hot beverage.png',

            ],
            [
                'id' => 2,
                'nama' => 'Fancy',
                'deskripsi' => 'Pengalaman elegan dan berkelas untuk momen spesialmu.',
                'icons' => 'Teacup without handle.png',

            ],
            [
                'id' => 3,
                'nama' => 'Keluarga',
                'deskripsi' => 'Momen hangat dan seru yang dirancang khusus kebersamaan keluarga.',
                'icons' => 'Ferris Wheel.png',

            ],
            [
                'id' => 4,
                'nama' => 'Romantis',
                'deskripsi' => 'Suasana penuh cinta dan kehangatan bersama orang tersayang.',
                'icons' => 'red heart.png',

            ],
            [
                'id' => 5,
                'nama' => 'Petualangan',
                'deskripsi' => 'Eksplorasi seru di bawah langit malam dan tantangan baru.',
                'icons' => 'moon.png',

            ],
            [
                'id' => 6,
                'nama' => 'Produktif',
                'deskripsi' => 'Fokus maksimal untuk menyelesaikan tugas dan pekerjaanmu.',
                'icons' => 'laptop.png',

            ],
        ];

        DB::table('moods')->insert($moods);
    }
}
