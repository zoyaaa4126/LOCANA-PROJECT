<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\places;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $places = Places::pluck('id')->toArray();

        if (empty($users) || empty($places)) {
            $this->command->warn('User atau Place belum tersedia.');
            return;
        }

        $reviews = [
            [
                'rating' => 5,
                'title' => 'Tempat wisata yang sangat menarik',
                'comment' => 'Pemandangannya indah dan fasilitasnya lengkap.',
            ],
            [
                'rating' => 4,
                'title' => 'Cukup bagus untuk dikunjungi',
                'comment' => 'Harga tiket terjangkau dan lokasi mudah ditemukan.',
            ],
            [
                'rating' => 3,
                'title' => 'Standar saja',
                'comment' => 'Tempatnya lumayan, tetapi perlu perawatan lebih.',
            ],
            [
                'rating' => 5,
                'title' => 'Sangat direkomendasikan',
                'comment' => 'Pelayanan ramah dan suasana nyaman.',
            ],
            [
                'rating' => 2,
                'title' => 'Kurang memuaskan',
                'comment' => 'Area parkir sempit dan cukup ramai.',
            ],
        ];

        foreach ($reviews as $review) {
            DB::table('reviews')->insert([
                'user_id' => $users[array_rand($users)],
                'place_id' => $places[array_rand($places)],
                'rating' => $review['rating'],
                'title' => $review['title'],
                'comment' => $review['comment'],
                'file_url' => json_encode([]), // jika tidak ada file
                'helpful_count' => rand(0, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}