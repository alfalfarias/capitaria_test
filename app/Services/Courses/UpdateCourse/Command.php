<?php

namespace App\Services\Courses\UpdateCourse;

use App\Models\Courses\Course;

class Command
{
	public static function run(array $data): Course
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $course_id = $data['id'];
    	$course = Course::find($course_id);
    	$course->update($data);
		return $course;
	}
}