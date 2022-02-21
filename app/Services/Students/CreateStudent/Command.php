<?php

namespace App\Services\Students\CreateStudent;

use App\Models\Students\Student;

class Command
{
	public static function run(array $data): Student
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $student = Student::create($data);

		$course_ids = $data['courses'];
		$student->courses()->sync($course_ids);

		return $student;
	}
}