<?php

namespace Database\Seeders;

use App\Models\Egg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EggSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        

        // Generate dummy data and insert into the eggs table
        $days = 100;
        for ($i = 0; $i < $days; $i++) {
            $currentDate = Carbon::now();
            Egg::create([
                'peewee_count' => $faker->numberBetween(0, 100),
                'pullet_count' => $faker->numberBetween(0, 100),
                'small_count' => $faker->numberBetween(0, 100),
                'medium_count' => $faker->numberBetween(0, 100),
                'large_count' => $faker->numberBetween(0, 100),
                'extra_large_count' => $faker->numberBetween(0, 100),
                'jumbo_count' => $faker->numberBetween(0, 100),
                'crack_count' => $faker->numberBetween(0, 10),
                'sorting_date' => $currentDate->subDays(($days - 1) - $i)->toDateString(),
            ]);
        }
    }
}
