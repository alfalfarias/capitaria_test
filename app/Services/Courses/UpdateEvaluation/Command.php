<?php

namespace App\Services\Courses\UpdateEvaluation;

use App\Models\Courses\Evaluation;

class Command
{
	public static function run(array $data): Evaluation
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $course_id = $data['id'];
    	$course = Evaluation::find($course_id);
    	$course->update($data);
		return $course;
	}
}