<?php

namespace App\Services\Students\CreateEvaluation;

use App\Models\Students\Evaluation;

class Command
{
	public static function run(array $data): Evaluation
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $evaluation = Evaluation::create($data);
		return $evaluation;
	}
}