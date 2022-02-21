<?php

namespace App\Services\Students\UpdateEvaluation;

use App\Models\Students\Evaluation;

class Command
{
	public static function run(array $data): Evaluation
	{
	    $validator = new Validator($data);
	    $data = $validator->data;
	    $evaluation_id = $data['id'];
    	$evaluation = Evaluation::find($evaluation_id);
    	$evaluation->update($data);
		return $evaluation;
	}
}