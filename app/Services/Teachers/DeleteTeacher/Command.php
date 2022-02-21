<?php

namespace App\Services\Teachers\DeleteTeacher;

use App\Models\Teachers\Teacher;

class Command
{
	public static function run(array $data): Teacher
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $teacher_id = $data['id'];
    	$teacher = Teacher::find($teacher_id);
    	$teacher->delete();
		return $teacher;
	}
}