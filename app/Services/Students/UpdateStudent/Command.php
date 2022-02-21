<?php

namespace App\Services\Students\UpdateStudent;

use App\Models\Students\Student;

class Command
{
	public static function run(array $data): Student
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $student_id = $data['id'];
    	$student = Student::find($student_id);
    	$student->update($data);

		if (isset($data['courses'])) {
			$course_ids = $data['courses'];
			$student->courses()->sync($course_ids);
		}

		return $student;
	}
}