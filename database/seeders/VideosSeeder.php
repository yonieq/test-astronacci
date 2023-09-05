<?php

namespace Database\Seeders;

use App\Models\Videos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Videos::create([
                'title' => $faker->sentence,
                'description' => $faker->sentence,
                'url' => 'https://www.youtube.com/watch?v=JGwWNGJdvx8',
            ]);
        }
    }
}
