<?php

namespace App\Services\Students\UpdateStudent;

use App\Models\Courses\Course;
use App\Models\Students\Student;
use Illuminate\Support\Facades\Validator as LaravelValidator;
use Illuminate\Validation\Rule;

class Validator
{
  public $data;

  public function __construct(array $data = [])
  {
    $this->data = $data;

    $validator = LaravelValidator::make($this->data, [
      'id' => 'required|exists:'.Student::TABLE,
    ]);
    $validator->validate();

    $validator = LaravelValidator::make($this->data, [
      'id' => 'required',
      'dni' => [
        Rule::unique(Student::TABLE)->ignore($data['id']),
      ],
      'name' => 'string',
      'surname' => 'string',
      'courses' => 'nullable|array|min:1',
      'courses.*' => 'integer|exists:'.Course::TABLE.',id',
    ]);
    $validator->validate();
  }
}