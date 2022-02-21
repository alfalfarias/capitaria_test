<?php

namespace App\Services\Courses\UpdateEvaluation;

use App\Models\Courses\Course;
use App\Models\Courses\Evaluation;
use Illuminate\Support\Facades\Validator as LaravelValidator;
use Illuminate\Validation\Rule;

class Validator
{
  public $data;

  public function __construct(array $data = [])
  {
    $this->data = $data;

    $validator = LaravelValidator::make($this->data, [
      'id' => 'required|exists:'.Evaluation::TABLE,
    ]);
    $validator->validate();

    $validator = LaravelValidator::make($this->data, [
      'course_id' => 'required|exists:'.Course::TABLE.',id',
    ]);
    $validator->validate();

    $course_id = $this->data['course_id'];
    $validator = LaravelValidator::make($this->data, [
      'name' => [
        Rule::unique(Evaluation::TABLE)->where(function ($query) use ($course_id) {
          return $query->where('course_id', $course_id);
        })
      ],
      'value' => 'integer|min:1',
    ]);
    $validator->validate();
  }
}