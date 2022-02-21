<?php

namespace Database\Seeders\Faker;

use App\Models\Students\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::create([
            'dni' => '22718998',
            'name' => 'Simon',
            'surname' => 'Farias',
        ]);
        $student->courses()->sync([1,2,3,4]);
        $evaluations = $student->evaluations()->createMany([
            [
                'evaluation_id' => 1,
                'value' => 10,
            ],
            [
                'evaluation_id' => 2,
                'value' => 10,
            ],
            [
                'evaluation_id' => 3,
                'value' => 10,
            ],
            [
                'evaluation_id' => 4,
                'value' => 10,
            ],
        ]);

        $student = Student::create([
            'dni' => '27546258',
            'name' => 'Andreina',
            'surname' => 'Perez',
        ]);
        $student->courses()->sync([1]);
        $evaluations = $student->evaluations()->createMany([
            [
                'evaluation_id' => 1,
                'value' => 5,
            ],
            [
                'evaluation_id' => 2,
                'value' => 10,
            ],
            [
                'evaluation_id' => 3,
                'value' => 5,
            ],
            [
                'evaluation_id' => 4,
                'value' => 10,
            ],
        ]);

        $student = Student::create([
            'dni' => '25415654',
            'name' => 'Oscar',
            'surname' => 'Marcano',
        ]);
        $student->courses()->sync([3,4]);
        $evaluations = $student->evaluations()->createMany([
            [
                'evaluation_id' => 1,
                'value' => 50,
            ],
            [
                'evaluation_id' => 2,
                'value' => 50,
            ],
            [
                'evaluation_id' => 3,
                'value' => 60,
            ],
            [
                'evaluation_id' => 4,
                'value' => 60,
            ],
        ]);

        $student = Student::create([
            'dni' => '13625314',
            'name' => 'Oscar',
            'surname' => 'Marcano',
        ]);
        $student->courses()->sync([2,3,4]);
        $evaluations = $student->evaluations()->createMany([
            [
                'evaluation_id' => 1,
                'value' => 90,
            ],
            [
                'evaluation_id' => 2,
                'value' => 95,
            ],
            [
                'evaluation_id' => 3,
                'value' => 90,
            ],
            [
                'evaluation_id' => 4,
                'value' => 93,
            ],
        ]);
    }
}
