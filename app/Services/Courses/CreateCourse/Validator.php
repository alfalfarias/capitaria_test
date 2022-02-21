<?php

namespace App\Services\Courses\CreateCourse;

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
      'teacher_id' => 'required|exists:'.Teacher::TABLE.',id',
      'name' => 'required|unique:'.Course::TABLE.',name',
    ]);
    $validator->validate();
  }
}