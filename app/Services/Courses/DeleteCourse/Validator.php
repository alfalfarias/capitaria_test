<?php

namespace App\Services\Courses\DeleteCourse;

use App\Models\Courses\Course;
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
  }
}