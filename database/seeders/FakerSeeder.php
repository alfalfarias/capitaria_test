<?php

namespace Database\Seeders;

use Database\Seeders\Faker\CourseSeeder;
use Database\Seeders\Faker\StudentSeeder;
use Database\Seeders\Faker\StudentEvaluationSeeder;
use Database\Seeders\Faker\TeacherSeeder;
use Database\Seeders\Faker\PlayerSeeder;
use Illuminate\Database\Seeder;

class FakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(TeacherSeeder::class);
      $this->call(CourseSeeder::class);
      $this->call(StudentSeeder::class);
      $this->call(StudentEvaluationSeeder::class);
      $this->call(PlayerSeeder::class);
    }
}
