<?php

namespace Database\Seeders\Faker;

use App\Models\Students\Student;
use Illuminate\Database\Seeder;

class StudentEvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::find(1);
        $courses = $student->courses()->get();
        foreach ($courses as $course) {
            $evaluations = $course->evaluations()->get();
            foreach ($evaluations as $evaluation) {
                $student->evaluations()->create([
                    'evaluation_id' => $evaluation->id,
                    'value' => rand(0,10),
                ]);
            }
        }
        
        $student = Student::find(2);
        $courses = $student->courses()->get();
        foreach ($courses as $course) {
            $evaluations = $course->evaluations()->get();
            foreach ($evaluations as $evaluation) {
                $student->evaluations()->create([
                    'evaluation_id' => $evaluation->id,
                    'value' => rand(40,49),
                ]);
            }
        }
        
        $student = Student::find(3);
        $courses = $student->courses()->get();
        foreach ($courses as $course) {
            $evaluations = $course->evaluations()->get();
            foreach ($evaluations as $evaluation) {
                $student->evaluations()->create([
                    'evaluation_id' => $evaluation->id,
                    'value' => rand(50,60),
                ]);
            }
        }
        
        $student = Student::find(4);
        $courses = $student->courses()->get();
        foreach ($courses as $course) {
            $evaluations = $course->evaluations()->get();
            foreach ($evaluations as $evaluation) {
                $student->evaluations()->create([
                    'evaluation_id' => $evaluation->id,
                    'value' => rand(90,100),
                ]);
            }
        }
    }
}
