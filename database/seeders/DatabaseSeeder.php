<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Lesson::factory()->count(20)->create();
        $this->call(AchievementTableSeeder::class);
        $this->call(BadgeTableSeeder::class);
        // $this->call(TestSeeder::class);
    }
}
