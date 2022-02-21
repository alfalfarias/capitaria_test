<?php

namespace App\Services\Courses\UpdateCourse;

use App\Models\Courses\Course;
use App\Models\Teachers\Teacher;
use Illuminate\Support\Facades\Validator as LaravelValidator;
use Illuminate\Validation\Rule;

class Validator
{
  public $data;

  public function __construct(array $data = [])
  {
    $this->data = $data;

    $validator = LaravelValidator::make($this->data, [
      'id' => 'required|exists:'.Course::TABLE,
    ]);
    $validator->validate();

    $validator = LaravelValidator::make($this->data, [
      'id' => 'required',
      'teacher_id' => 'exists:'.Teacher::TABLE.',id',
      'name' => [
        Rule::unique(Course::TABLE)->ignore($data['id']),
      ],
    ]);
    $validator->validate();
  }
}