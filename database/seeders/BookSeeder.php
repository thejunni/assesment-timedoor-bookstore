<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $authors = \DB::table('authors')->pluck('id')->toArray(); // Ambil semua ID Author
        $categories = \DB::table('categories')->pluck('id')->toArray(); // Ambil semua ID Category
        $books = [];

        for ($i = 0; $i < 100000; $i++) {
            $books[] = [
                'title' => $faker->sentence(3),
                'author_id' => $faker->randomElement($authors),
                'category_id' => $faker->randomElement($categories),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Bulk insert dalam batch untuk menghindari kehabisan memori
            if ($i % 10000 === 0 && $i > 0) {
                \DB::table('books')->insert($books);
                $books = [];
            }
        }

        // Insert sisa data
        if (!empty($books)) {
            \DB::table('books')->insert($books);
        }
    }
}
