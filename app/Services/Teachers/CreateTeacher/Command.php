<?php

namespace App\Services\Teachers\CreateTeacher;

use App\Models\Teachers\Teacher;

class Command
{
	public static function run(array $data): Teacher
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $teacher = Teacher::create($data);
		return $teacher;
	}
}