<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = [];

        for ($i = 0; $i < 3000; $i++) {
            $categories[] = [
                'name' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert semua data sekaligus
        \DB::table('categories')->insert($categories);
    }
}
