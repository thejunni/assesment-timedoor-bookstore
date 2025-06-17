<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $authors = [];

        for ($i = 0; $i < 1000; $i++) {
            $authors[] = [
                'name' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Bulk insert semua data sekaligus
        \DB::table('authors')->insert($authors);
    }
    
}
