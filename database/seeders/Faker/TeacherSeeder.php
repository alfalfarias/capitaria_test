<?php

namespace Database\Seeders\Faker;

use App\Models\Teachers\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = Teacher::create([
            'dni' => '112358',
            'name' => 'Fabricio',
            'surname' => 'Guevara',
        ]);
        $teacher = Teacher::create([
            'dni' => '852147',
            'name' => 'Judith',
            'surname' => 'Devia',
        ]);
        $teacher = Teacher::create([
            'dni' => '245951',
            'name' => 'Marcos',
            'surname' => 'Contreras',
        ]);
        $teacher = Teacher::create([
            'dni' => '369528',
            'name' => 'Francy',
            'surname' => 'Tononi',
        ]);
    }
}
