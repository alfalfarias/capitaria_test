<?php

namespace App\Services\Courses\CreateEvaluation;

use App\Models\Courses\Evaluation;

class Command
{
	public static function run(array $data): Evaluation
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
		$data['value'] = 100;
	    $evaluation = Evaluation::create($data);
		return $evaluation;
	}
}