<?php

namespace App\Services\Students\DeleteStudent;

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
  }
}