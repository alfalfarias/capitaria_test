<?php

namespace App\Services\Students\CreateStudent;

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
      'dni' => 'required|unique:'.Student::TABLE,
      'name' => 'required|string',
      'surname' => 'required|string',
      'courses' => 'required|array|min:1',
      'courses.*' => 'required|integer|exists:'.Course::TABLE.',id',
    ]);
    $validator->validate();
  }
}