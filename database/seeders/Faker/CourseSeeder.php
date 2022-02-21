<?php

namespace Database\Seeders\Faker;

use App\Models\Courses\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = Course::create([
            'teacher_id' => 1,
            'name' => 'Programacion',
        ]);
        $evaluations = $course->evaluations()->createMany([
            [
                'name' => 'Examen I',
                'value' => 100,
            ],
            [
                'name' => 'Examen II',
                'value' => 100,
            ],
            [
                'name' => 'Examen III',
                'value' => 100,
            ],
            [
                'name' => 'Examen IV',
                'value' => 100,
            ],
        ]);

        $course = Course::create([
            'teacher_id' => 3,
            'name' => 'Matemáticas I',
        ]);
        $evaluations = $course->evaluations()->createMany([
            [
                'name' => 'Examen I',
                'value' => 100,
            ],
            [
                'name' => 'Examen II',
                'value' => 100,
            ],
            [
                'name' => 'Examen III',
                'value' => 100,
            ],
            [
                'name' => 'Examen IV',
                'value' => 100,
            ],
        ]);

        $course = Course::create([
            'teacher_id' => 3,
            'name' => 'Matemáticas II',
        ]);
        $evaluations = $course->evaluations()->createMany([
            [
                'name' => 'Examen I',
                'value' => 100,
            ],
            [
                'name' => 'Examen II',
                'value' => 100,
            ],
            [
                'name' => 'Examen III',
                'value' => 100,
            ],
            [
                'name' => 'Examen IV',
                'value' => 100,
            ],
        ]);

        $course = Course::create([
            'teacher_id' => 4,
            'name' => 'Física I',
        ]);
        $evaluations = $course->evaluations()->createMany([
            [
                'name' => 'Examen I',
                'value' => 100,
            ],
            [
                'name' => 'Examen II',
                'value' => 100,
            ],
            [
                'name' => 'Examen III',
                'value' => 100,
            ],
            [
                'name' => 'Examen IV',
                'value' => 100,
            ],
        ]);
    }
}
