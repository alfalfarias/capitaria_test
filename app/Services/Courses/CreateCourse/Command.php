<?php

namespace App\Services\Courses\CreateCourse;

use App\Models\Courses\Course;

class Command
{
	public static function run(array $data): Course
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $course = Course::create($data);
		return $course;
	}
}