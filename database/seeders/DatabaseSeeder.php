<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(HeroSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(TrainingSeeder::class);
    }
}
