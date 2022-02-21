<?php

namespace App\Services\Students\DeleteStudent;

use App\Models\Students\Student;

class Command
{
	public static function run(array $data): Student
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $course_id = $data['id'];
    	$student = Student::find($course_id);
    	$student->delete();
		return $student;
	}
}