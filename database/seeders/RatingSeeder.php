<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Rating; 
use App\Models\Book; 

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() 
    {
        ini_set('memory_limit', '2G');
        $faker = Faker::create();

        // Bulk insert for ratings
        $books = Book::pluck('id')->toArray();

        $ratings = [];
        for ($i = 0; $i < 500000; $i++) {
            $ratings[] = [
                'book_id' => $books[array_rand($books)],
                'rating' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // insert in chunk to manage memory
            if (count($ratings) >= 1000) {
                Rating::insert($ratings);
                $ratings = [];
            }
        }
        if (!empty($ratings)) {
            Rating::insert($ratings);
        }
    }
}
